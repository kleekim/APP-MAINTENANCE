<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    :root {
        --vert-principal: #006937;
        --vert-sombre: #004d28;
        --vert-clair: #008a47;
        --jaune-charte: #f7be00;
        --jaune-hover: #ffcc14;
    }

    
    .footer-bar {
        background: var(--vert-sombre);
        padding: 32px 24px;
        font-family: 'Montserrat', 'Segoe UI', sans-serif;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .footer-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .footer-bar p {
        color: rgba(255, 255, 255, 0.75);
        font-size: 14px;
        margin: 0;
    }

    .footer-bar p a {
        color: var(--jaune-charte);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
    }

    .footer-bar p a:hover {
        color: var(--jaune-hover);
    }

    
    .social-icons {
        display: flex;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .social-icons li a {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: all 0.25s ease;
    }

    .social-icons li a:hover {
        background: var(--vert-principal);
        border-color: var(--vert-principal);
        color: #fff;
        transform: translateY(-2px);
    }

   
    @media (max-width: 640px) {
        .footer-inner {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="footer-bar">
    <div class="footer-inner">
        <p>
            Copyright © <?php echo date("Y"); ?> — Développé par 
            <a href="https://acsi.cg/" target="_blank">ACSI</a> (Pointe-Noire)
        </p>

        <ul class="social-icons">
            <li><a href="https://www.facebook.com/profile.php?id=100094505274964" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="https://www.instagram.com/acsicongo/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="https://cg.linkedin.com/company/agence-congolaise-des-systemes-d-information-acsi" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="https://www.youtube.com/@ACSICONGO" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
        </ul>
    </div>
</footer>