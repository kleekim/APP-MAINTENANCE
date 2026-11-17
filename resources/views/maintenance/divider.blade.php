<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');

    * {
        box-sizing: border-box;
    }

    .services-section {
        padding: 72px 48px;
        background: #f9fafb;
        font-family: 'Montserrat', sans-serif;
    }

    .services-grid {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }

    .svc-card {
        background: #fff;
        border: 1px solid #e8edf2;
        border-top: 3px solid #e8edf2;
        border-radius: 12px;
        padding: 36px 32px 32px;
        transition: border-top-color .2s, box-shadow .2s, transform .2s;
        position: relative;
    }

    .svc-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, .08);
    }

    .svc-card.c-green {
        border-top-color: #f7be00;
    }

    .svc-card.c-yellow {
        border-top-color: #f7be00;
    }

    .svc-card.c-slate {
        border-top-color: #f7be00;
    }

    .svc-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .ic-green {
        background: #f0fdf4;
        color: #16a34a;
    }

    .ic-yellow {
        background: #fefce8;
        color: #ca8a04;
    }

    .ic-blue {
        background: #eff6ff;
        color: #2563eb;
    }

    .svc-card h3 {
        font-size: 17px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 10px;
    }

    .svc-card p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.7;
        margin: 0 0 22px;
    }

    .svc-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: gap .2s;
    }

    .svc-link:hover {
        gap: 12px;
        text-decoration: none;
    }

    .lk-green {
        color: #16a34a;
    }

    .lk-yellow {
        color: #ca8a04;
    }

    .lk-blue {
        color: #2563eb;
    }

    @media(max-width:900px) {
        .services-section {
            padding: 56px 24px;
        }

        .services-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width:600px) {
        .services-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="services-section" id="services">
    <div class="services-grid">

        <div class="svc-card c-green">
            <div class="svc-icon ic-green">
                <i class="fa-solid fa-users"></i>
            </div>
            <h3>Client Particuliers</h3>
            <p>Soumettez une demande de maintenance et suivez son traitement en temps réel, de la prise en charge jusqu'à la résolution.</p>

        </div>

        <div class="svc-card c-yellow">
            <div class="svc-icon ic-yellow">
                <i class="fa-solid fa-building"></i>
            </div>
            <h3>Clients Contractuels</h3>
            <p>Une maintenance planifiée et prise en charge par nos techniciens, selon les termes de votre contrat.</p>

        </div>

        <div class="svc-card c-slate">
            <div class="svc-icon ic-red" style="color:#ae1410; background:#fee2e2;">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <h3>Facturation et paiement</h3>
            <p>Recevez et consultez vos factures en toute sécurité dès qu'une intervention est finalisée</p>
        </div>

    </div>
</section>
