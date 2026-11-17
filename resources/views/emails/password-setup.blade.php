<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif; padding: 20px; max-width: 600px; margin: auto;">

    <h2 style="color: #2d3748;">Demande de Maintenance Approuvée</h2>

    <p>Bonjour <strong>{{ $user->name }}</strong>,</p>
    <p>Votre demande de maintenance a été <strong>approuvée</strong>.</p>
    <p>Cliquez sur le bouton ci-dessous pour définir votre mot de passe. 
       Ce lien est <strong>valable 24h</strong>.</p>

    <a href="{{ $url }}"
       style="display:inline-block; padding:12px 24px; background:#2d3748;
              color:#fff; text-decoration:none; border-radius:6px; margin: 20px 0;">
        Définir mon mot de passe
    </a>

    <p style="color: #888; font-size: 13px;">
        Si vous n'êtes pas à l'origine de cette demande, ignorez cet email.
    </p>
 
</body>
</html>