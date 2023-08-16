<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\States;
use App\Models\User;
use App\Models\UserResume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\Components\Defer;
use ProtoneMedia\Splade\Components\Link;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;
use ProtoneMedia\Splade\FormBuilder\Button;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Email;
use ProtoneMedia\Splade\FormBuilder\File;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Number;
use ProtoneMedia\Splade\FormBuilder\Password;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\FormBuilder\Text;
use ProtoneMedia\Splade\FormBuilder\Textarea;
use ProtoneMedia\Splade\SpladeForm;


class ResumeController extends Controller
{

    public static function rules(): array
    {
        return [
            'photo' => ['required', 'file'],
            'nome' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'objetivo' => ['required', 'string', 'max:350'],
            'telefone' => ['required', 'string', 'min:10'],
            'skills' => ['required', 'array'],
            'nascimento' => ['required', 'date'],
            'uf' => ['required', 'string', 'max:150'],
            'cidade' => ['required', 'string', 'max:150'],
        ];
    }

    public function show(UserResume $resume)
    {

        //dd($resume->skills);
        return view('resume.resume', [
            'resume' => $resume,
        ]);
    }

    public function edit(UserResume $resume)
    {

        $states = States::orderBy('name')->select('name', 'id')->get();
        $cidades = City::orderBy('name')->select('name', 'id')->where('state_id', $resume->uf)->get();

        $soft = [
            "Comunicação" => "Comunicação",
            "Trabalho em Equipe" => "Trabalho em Equipe",
            "Pensamento Crítico" => "Pensamento Crítico",
            "Criatividade" => "Criatividade",
            "Adaptabilidade" => "Adaptabilidade",
            "Resolução de Conflitos" => "Resolução de Conflitos",
            "Empatia" => "Empatia",
            "Inteligência Emocional" => "Inteligência Emocional",
            "Liderança" => "Liderança",
            "Habilidade de Resolução de Problemas" => "Habilidade de Resolução de Problemas",
            "Gerenciamento do Tempo" => "Gerenciamento do Tempo",
            "Adaptabilidade" => "Adaptabilidade",
            "Resiliência" => "Resiliência",
            "Habilidade de Networking" => "Habilidade de Networking",
            "Comunicação Digital" => "Comunicação Digital",
        ];

        $form = SpladeForm::make()
            ->id('form')
            ->action(route('resume.update', ['resume' => $resume]))
            ->class('space-y-4')
            ->fields([
                File::make('photo')->label('Insira uma Foto')
                    ->filepond() // Enables filepond
                    ->accept(['image/png', 'image/jpeg'])
                    ->preview(),
                Input::make('nome')->required()->label('Name Completo'),
                Date::make('nascimento')->label('Data de Nascimento'),
                Number::make('telefone')->label('Celular (insira o DDD e o número)')->prepend('+55'),
                Email::make('email')->required()->label('Email'),
                Select::make('uf')->label('Estado')->options($states->toArray())->optionLabel('name')->optionValue('id')->remoteRoot('data.uf')->id('uf')->placeholder('Selecione um Estado')->choices(false),
                Select::make('cidade')->label('Cidade')->options($cidades->toArray())->optionLabel('name')->optionValue('id')->id('cidade')->placeholder('Selecione uma Cidade')->choices(false),
                Select::make('skills')->label('Soft Skills (Escolha apenas 3)')->options($soft)->multiple()->choices(['searchEnabled' => false, 'max' => 3])->help('As habilidades interpessoais, também conhecidas como soft skills, são competências pessoais e sociais que são igualmente importantes, senão mais, do que as habilidades técnicas em muitos contextos. Escolha três Soft Skills que você mais se identifica para traçarmos o seu perfil:'),
                Textarea::make('objetivo')->label('Objetivo')->id('objetivo')->autosize()->help('Se precisar de ajuda com esse campo, clique no botão Objetivo abaixo para ver sugestões de como preencher esse campo, não esqueça de trocar as informações destacadas.'),
                Submit::make()->label('Create'),
            ])
            ->fill($resume);


        return view('resume.edit', [
            'resume' => $resume,
            'form' => $form
        ]);
    }

    public function update(Request $request, UserResume $resume)
    {

        dd($request->all());
        $data = $request->validate([
            'nome' => ['required', 'string', 'max:100']
        ]);

        $resume->update($data);

        Toast::title('Currículo atualizado com sucesso!');

        return redirect()->route('resume.show',  $resume);
    }

    public function store(Request $request)
    {

        
        $data = $request->validate(ResumeController::rules());

        HandleSpladeFileUploads::forRequest($request, 'photo');
        $path = $request->file('photo')->store('avatar/' . auth()->user()->id);

        $data = $request->all();
        $data['telefone'] = "55$request->telefone";
        $data['nascimento'] = Carbon::parse($data['nascimento']);
        $data['photo'] = $path;
        $request->replace($data);
        //dd($data);
        //dd($request->all());

        

        //dd($data);

        $user = auth()->user();
        $user->resume()->create($data);

        Toast::title('Currículo criado com sucesso!');

        return redirect("/");
    }


    public function create(Request $request)
    {
        $states = States::orderBy('title')->select('title', 'id')->get();
        //  dd(($states->toArray())[0]['name']);
        $soft = [
            "Comunicação" => "Comunicação",
            "Trabalho em Equipe" => "Trabalho em Equipe",
            "Pensamento Crítico" => "Pensamento Crítico",
            "Criatividade" => "Criatividade",
            "Adaptabilidade" => "Adaptabilidade",
            "Resolução de Conflitos" => "Resolução de Conflitos",
            "Empatia" => "Empatia",
            "Inteligência Emocional" => "Inteligência Emocional",
            "Liderança" => "Liderança",
            "Habilidade de Resolução de Problemas" => "Habilidade de Resolução de Problemas",
            "Gerenciamento do Tempo" => "Gerenciamento do Tempo",
            "Adaptabilidade" => "Adaptabilidade",
            "Resiliência" => "Resiliência",
            "Habilidade de Networking" => "Habilidade de Networking",
            "Comunicação Digital" => "Comunicação Digital",
        ];

        $form = SpladeForm::make()
            ->id('form')
            ->action(route('resume.store'))
            ->class('space-y-4')
            ->fields([
                File::make('photo')->label('Insira uma Foto')
                    ->filepond() // Enables filepond
                    ->accept(['image/png', 'image/jpeg'])
                    ->preview(),
                Input::make('nome')->required()->label('Name Completo'),
                Date::make('nascimento')->label('Data de Nascimento'),
                Number::make('telefone')->label('Celular (insira o DDD e o número)')->prepend('+55'),
                Email::make('email')->required()->label('Email'),
                Select::make('uf')->label('Estado')->options($states->toArray())->optionLabel('title')->optionValue('id')->remoteRoot('data.uf')->id('uf')->placeholder('Selecione um Estado')->choices(false),
                Select::make('cidade')->label('Cidade')->id('city')->choices(false),
                Select::make('skills')->label('Soft Skills (Escolha apenas 3)')->options($soft)->multiple()->choices(['searchEnabled' => false, 'max' => 3])->help('As habilidades interpessoais, também conhecidas como soft skills, são competências pessoais e sociais que são igualmente importantes, senão mais, do que as habilidades técnicas em muitos contextos. Escolha três Soft Skills que você mais se identifica para traçarmos o seu perfil:'),
                Textarea::make('objetivo')->label('Objetivo')->id('objetivo')->autosize()->help('Se precisar de ajuda com esse campo, clique no botão Objetivo abaixo para ver sugestões de como preencher esse campo, não esqueça de trocar as informações destacadas.'),
                Submit::make()->label('Create'),
            ]);

        //dd($form);
        return view('resume.create', [
            'form' => $form,
        ]);
    }

    public function create1(Request $request)
    {
        //dd($request->all());
        $skills = (json_encode($request->skills, true));

        $de = array('(', ')', ' ', '-');
        $para = array('', '', '', '');
        $telefone = '55' . str_replace($de, $para, $request->tel);
        //dd($telefone);

        Auth::user()->resume()->create([
            "nome" => $request->name,
            "nascimento" => $request->nascimento,
            "telefone" => $telefone,
            "email" => $request->email,
            "uf" => $request->state,
            "cidade" => $request->city,
            "skills" => $skills,
            "objetivo" => $request->objetivo,
        ]);

        $status = "Currículo criado com sucesso";
        return back()->with('status', __($status));
    }
}
