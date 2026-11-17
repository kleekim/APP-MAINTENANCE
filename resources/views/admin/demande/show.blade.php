<div style="max-width:600px; margin:40px auto; font-family:Arial, sans-serif;">

    <div style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h3 style="margin-bottom:15px; color:#333;">DETAIL DE LA DEMANDE</h3>

        <p><strong>Client :</strong> {{ $demande->nom_complet }}</p>
        <p><strong>Objet :</strong> {{ $demande->objet }}</p>

        <div style="margin-top:15px;">
            <strong>Message :</strong>
            <div style="margin-top:8px; background:#f5f5f5; padding:12px; border-radius:6px;">
                {{ $demande->panne }}
            </div>
        </div>

    </div>

</div>