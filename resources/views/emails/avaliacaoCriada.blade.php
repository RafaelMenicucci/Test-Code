<html>
    <body>
        <p>Olá {{ $usuarios->nome }}!</p>
        <p></p>
        <p>Uma avaliação da disciplina {{$disciplina}} foi criada. Clique no botão abaixo para ir a página da disciplina ou então entre em nosso site.</p>
        <p>
        @component('mail::button', ['url' => 'http://127.0.0.1:8000/aluno/'.$disciplina, 'color' => 'success'])
            Test&Code
        @endcomponent
        </p>
        <p>Equipe Test&Code.</p>
    </body>
</html>