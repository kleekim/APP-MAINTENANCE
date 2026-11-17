@extends('components.layouts.app.misepg')

@section('content')

<iframe src="{{ asset('contrats/contrat ACSI , DRTV.pdf') }}" width="100%" height="600px">
    Votre navigateur ne supporte pas l'affichage des PDFs. 
    <a href="{{ asset('contrats/contrat ACSI , DRTV.pdf') }}">Télécharger le PDF</a>
</iframe>





@endsection



