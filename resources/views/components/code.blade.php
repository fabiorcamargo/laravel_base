
 <!-- component -->
      <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
        <div class="flex flex-col items-center justify-center text-center space-y-2">
          <div class="font-semibold text-3xl">
            <p>Código de Ativação</p>
          </div>
          <div class="flex flex-row text-sm font-medium text-gray-400">
            <p>Insira abaixo o código de ativação recebido, para ter acesso Premium!</p>
          </div>
        </div>
  
        <div>
          <form action="/code/verify" method="post">
            @csrf
            <div class="flex flex-col space-y-16">
              <div class="flex flex-row items-center justify-between mx-auto w-full max-w-xs">
                <div class="w-16 h-16 me-2">
                  <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="code[]" id="code[]">
                </div>
                <div class="w-16 h-16 me-2">
                  <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="code[]" id="code[]">
                </div>
                <div class="w-16 h-16 me-2">
                  <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="code[]" id="code[]">
                </div>
                <div class="w-16 h-16 me-2">
                  <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="code[]" id="code[]">
                </div>
                <div class="w-16 h-16 me-2">
                  <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="code[]" id="code[]">
                </div>
              </div>
  
              <div class="flex flex-col space-y-5">
                <div>
                  <button class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm">
                    Verificar
                  </button>
                </div>
  
                <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                  <p>Não possuí um código?</p> <a class="flex flex-row items-center text-blue-600" href="http://" target="_blank" rel="noopener noreferrer">Resend</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>