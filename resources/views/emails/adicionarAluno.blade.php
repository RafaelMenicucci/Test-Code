<html>
    <body>
        <p>Olá {{ $usuario->nome }}!</p>
        <p></p>
        <p>Você foi adiciona na Disciplina {{$disciplina}}. Clique no botão abaixo para ir a sua página ou então entre em nosso site.</p>
        <p>
        @component('mail::button', ['url' => 'http://127.0.0.1:8000/aluno/home', 'color' => 'success'])
            Test&Code
        @endcomponent
        </p>
        <p>Equipe Test&Code.</p>
    </body>
</html>