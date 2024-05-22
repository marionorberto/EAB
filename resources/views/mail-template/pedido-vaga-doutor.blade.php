@if ($status == 'aceite')
<h2>Parabéns 🎊🎊🎊 sr/sra <strong>{{$firstname}} {{$lastname}}</strong></h2>
<p class="">
    A sua solicitação de vaga de doutor foi aceita com sucesso!
</p>
<p>Bem-vindo ao nosso team, estamos muitos felizes e ansioso por trabalhar com profissional como você.
</p>
<img src="{{URL::to('img/undraw_doctor_kw-5-l.svg')}}" alt="" srcset="">
<p>Agora és um de nós 🙂. clique para se cadastrar na nossa plataforma -
    <a href="http://localhost:8000/doutor/create">casdastrar-me agora</a>
</p>
@endif

@if($status == 'rejeitado')
<h2>Sr/Sra <strong>{{$firstname}} {{$lastname}}</strong>.</h2>
<p class="">
    Infelizmente o seu pedido foi rejeitado.
</p>
<p>
    Obrigado por nos escolher como parceiro profissional.
</p>
@endif