<?php

namespace App\Http\Controllers;

use App\Models\CodePremium;
use Carbon\Carbon;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CodePremiumController extends Controller
{
    public static function rules(): array
    {
        return [
            'code' => ['required', 'string', 'unique:users'],
            'validity' => ['required', 'string', 'max:150'],
        ];
    }

    public function verify(Request $request){
        //dd($request->all());
        //$code = ($request->code);
        $code = (implode("",$request->code));
        if(CodePremium::where('code', $code)->first()){
            Toast::title('Seu código é válido!')
            ->autoDismiss(5);
            return back();
        }else{
            Toast::warning('Código não encontado, por favor verifique o código e insira novamente')
            ->autoDismiss(5);
            return back();
        }
        
        

    }

    public function store(Request $request)
    {

        //dd($request->all());
        $data = $request->validate(ResumeController::rules());


        $data['nascimento'] = Carbon::parse($data['nascimento']);

        //dd($data);

        $user = auth()->user();
        $user->resume()->create($data);

        Toast::title('Currículo criado com sucesso!');

        return redirect("/");
    }
}
