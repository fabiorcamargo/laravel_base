

<x-layout>

    <div class="max-w-7xl mx-auto p-2 lg:p-8">
      <x-splade-modal id="objetivos_modal" name="objetivos_modal">
        <x-code></x-code>        
      </x-splade-modal>
      
      
      <section id="info" class="">

        

            <div class="gap-6 lg:gap-8">
                
                    <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
                      <div class="bg-white mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                        <div class="p-8 sm:p-10 lg:flex-auto">
                            <x-text-title :value="__('Seja premium no Portal de Carreiras')" />
                            <x-text-subtitle class="mt-6" :value="__('Os membros possuem benefícios que te ajudam a alcançar as melhores oportunidades.')" />
                          <p class="mt-6 text-base leading-7 text-gray-600"></p>
                          <div class="mt-10 flex items-center gap-x-4">
                            <x-text-p class="text-indigo-600 font-semibold" :value="__('O que está incluso?')" />
                            <div class="h-px flex-auto bg-gray-100"></div>
                          </div>
                          <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              <x-text-p :value="__('Acesso as vagas disponíveis em todos os Estados')" />
                              
                            </p>
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Criação de currículo com apoio de AI, tornando currículos mais competitivos
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              
                              Página profissional pessoal, de um UP no seu currículo
                            </li>
                            <li class="flex gap-x-3">
                              <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                              </svg>
                              Cadastro automáticos nas vagas de interesse
                            </li>
                          </ul>
                        </div>
                        <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                          <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                            <div class="mx-auto max-w-xs px-8">
                              <p class="text-base font-semibold text-gray-600">Pague uma única vez</p>
                              <p class="mt-6 flex items-baseline justify-center gap-x-2">
                                <span class="text-5xl font-bold tracking-tight text-gray-900">R$120</span>
                                <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">Reais</span>
                              </p>
                              <a href="#" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Adquirir agora</a>
                              <p class="mt-6 text-xs leading-5 text-gray-600">Possuí um código de ativação?<br>
                                <Link href="#objetivos_modal">
                                  <a href="#objetivos_modal" class="font-semibold text-indigo-600">Clique&nbsp;aqui!</a>. para validar</p>
                                </Link>
                                
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  




    
            </div>
        </section>
    </div>


<script>
    const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
        }

        const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
        }
</script>
</x-layout>