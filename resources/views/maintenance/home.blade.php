<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');
*{box-sizing:border-box;}

.hero{
    background:#006937;
    padding-top:72px;
    display:flex;align-items:center;
    position:relative;overflow:hidden;
    font-family:'Montserrat',sans-serif;
}

.hero::before{
    content:'';position:absolute;inset:0;
    background-image:radial-gradient(rgba(255,255,255,0.04) 1.5px,transparent 1.5px);
    background-size:32px 32px;pointer-events:none;z-index:0;
}

.hero-inner{
    position:relative;z-index:1;
    max-width:1280px;width:100%;margin:0 auto;
    padding:40px 48px 50px; 
    display:flex;align-items:center;
    justify-content:space-between;gap:48px;
}


.hero-left{flex:0 0 auto;width:42%;max-width:480px;}

.hero-eyebrow{
    display:inline-flex;align-items:center;gap:10px;
    margin-bottom:18px; 
}
.hero-eyebrow-bar{width:28px;height:3px;background:#f7be00;border-radius:2px;flex-shrink:0;}
.hero-eyebrow-txt{
    font-size:12px;font-weight:700;color:#f7be00;
    letter-spacing:1.4px;text-transform:uppercase;
}

.hero-h1{
    font-size:44px; 
    font-weight:800;
    color:#ffffff;line-height:1.05;
    margin:0 0 16px;letter-spacing:-1px; 
}

.hero-desc{
    font-size:14px;color:rgba(255,255,255,0.72);
    line-height:1.75;margin:0 0 28px;
    max-width:400px;
}

.hero-cta{
    display:inline-flex;align-items:center;gap:10px;
    background:#f7be00;color:#1a3a00;
    font-size:14px;font-weight:700;
    padding:14px 28px;border-radius:10px; /* padding réduit */
    text-decoration:none;transition:background .2s,transform .2s;
    font-family:'Montserrat',sans-serif;
}
.hero-cta:hover{background:#ffcc14;transform:translateY(-2px);color:#1a3a00;text-decoration:none;}
.hero-cta i{font-size:15px;}

.hero-right{
    flex:1;
    position:relative;
    min-height:380px; 
    display:flex;
    align-items:flex-end;
}


.hero-float-badge{
    position:absolute;top:10px;right:130px;z-index:10;
    background:#fff;border-radius:10px;padding:9px 14px;
    box-shadow:0 6px 20px rgba(0,0,0,.2);
    display:flex;align-items:center;gap:9px;
}
.hfb-icon{
    width:30px;height:30px;background:#dcfce7;border-radius:7px;
    display:flex;align-items:center;justify-content:center;
    font-size:13px;color:#16a34a;
}
.hfb-lbl{font-size:8px;color:#64748b;font-family:'Montserrat',sans-serif;}
.hfb-val{font-size:14px;font-weight:800;color:#0f172a;font-family:'Montserrat',sans-serif;}


.device-phone{
    position:absolute;
    left:20px;bottom:22px;z-index:4;
    width:130px; /* réduit */
    background:#111;border-radius:22px;padding:5px;
    box-shadow:0 28px 56px rgba(0,0,0,.45);
    border:1px solid #222;
}
.phone-notch{width:36px;height:3px;background:#222;border-radius:2px;margin:3px auto 5px;}
.phone-screen{background:#006937;border-radius:16px;overflow:hidden;padding:9px 9px 10px;}
.ps-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;}
.ps-logo{font-size:10px;font-weight:800;color:#fff;letter-spacing:1px;}
.ps-ava{width:16px;height:16px;background:rgba(255,255,255,0.15);border-radius:50%;}
.ps-label{font-size:7.5px;color:rgba(255,255,255,.6);margin-bottom:2px;line-height:1.3;}
.ps-status{
    display:inline-flex;align-items:center;gap:4px;
    background:rgba(74,222,128,.15);border:1px solid rgba(74,222,128,.3);
    border-radius:4px;padding:3px 7px;margin-bottom:6px;margin-top:4px;
}
.ps-dot{width:5px;height:5px;background:#4ade80;border-radius:50%;}
.ps-stxt{font-size:7px;color:#4ade80;font-weight:600;}
.ps-refbox{background:rgba(255,255,255,.1);border-radius:6px;padding:5px 7px;margin-bottom:6px;}
.ps-ref-row{display:flex;justify-content:space-between;margin-bottom:2px;}
.ps-ref-l{font-size:6.5px;color:rgba(255,255,255,.6);}
.ps-ref-v{font-size:6.5px;font-weight:700;color:#f7be00;}
.ps-ref-n{font-size:6px;color:rgba(255,255,255,.45);}
.ps-btn{background:#f7be00;border-radius:5px;padding:5px;text-align:center;font-size:7.5px;font-weight:700;color:#003d1f;}
.phone-home-bar{width:36px;height:2px;background:#333;border-radius:1px;margin:5px auto 2px;}


.device-desktop{
    position:absolute;
    left:100px;top:0;z-index:2;
    width:400px; 
}
.monitor-outer{
    background:#1a1a1a;border-radius:12px 12px 0 0;
    padding:6px 6px 0;border:1.5px solid #2a2a2a;
}
.monitor-bar{display:flex;align-items:center;gap:5px;padding:0 6px 5px;}
.m-dot{width:8px;height:8px;border-radius:50%;}
.mr{background:#ff5f57;}.my{background:#febc2e;}.mg{background:#28c840;}
.monitor-screen{background:#fff;border-radius:5px;overflow:hidden;height:200px;} /* réduit vs 220px */
.ms-nav{background:#006937;padding:7px 12px;display:flex;align-items:center;justify-content:space-between;}
.ms-logo{font-size:10px;font-weight:800;color:#fff;letter-spacing:1px;}
.ms-avatar{width:20px;height:20px;background:rgba(255,255,255,.15);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:7px;color:#fff;font-weight:700;}
.ms-body{display:flex;height:calc(200px - 34px);}
.ms-sidebar{width:72px;background:#006937;padding:7px 0;}
.ms-sb-item{padding:5px 9px;font-size:7px;color:rgba(255,255,255,.55);font-family:'Montserrat',sans-serif;}
.ms-sb-item.on{color:#f7be00;background:rgba(247,190,0,.12);border-left:2px solid #f7be00;padding-left:7px;}
.ms-main{flex:1;padding:10px;background:#f8fafb;}
.ms-title{font-size:9px;font-weight:700;color:#0f172a;margin-bottom:7px;}
.ms-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:5px;margin-bottom:7px;}
.ms-stat{background:#fff;border-radius:4px;padding:5px;border:1px solid #e8edf2;}
.ms-stat-ico{width:13px;height:13px;border-radius:3px;display:flex;align-items:center;justify-content:center;font-size:6px;margin-bottom:3px;}
.ico-g{background:#dcfce7;color:#16a34a;}.ico-y{background:#fef9c3;color:#ca8a04;}.ico-b{background:#dbeafe;color:#1d4ed8;}
.ms-stat-v{font-size:9px;font-weight:700;color:#0f172a;line-height:1;}
.ms-stat-l{font-size:6px;color:#94a3b8;margin-top:2px;}
.ms-charts{display:grid;grid-template-columns:1.5fr 1fr;gap:5px;}
.ms-chart{background:#fff;border-radius:4px;padding:6px;border:1px solid #e8edf2;}
.ms-chart-t{font-size:6px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.4px;margin-bottom:5px;}
.ms-bars{display:flex;align-items:flex-end;gap:2px;height:36px;}
.ms-bar{flex:1;border-radius:2px 2px 0 0;}
.bl{background:#bbf7d0;}.bm{background:#22c55e;}.bw{background:#fef08a;}
.ms-donut{display:flex;align-items:center;justify-content:center;height:36px;}
.monitor-stand{width:80px;height:15px;background:#1a1a1a;margin:0 auto;border-radius:0 0 3px 3px;border:1.5px solid #2a2a2a;border-top:none;}
.monitor-base{width:120px;height:6px;background:#111;margin:0 auto;border-radius:2px;}


.device-tablet{
    position:absolute;
    right:0;bottom:22px;z-index:4;
    width:148px;
    background:#111;border-radius:12px;padding:5px;
    box-shadow:0 24px 48px rgba(0,0,0,.45);
    border:1px solid #222;
}
.tablet-screen{background:#fff;border-radius:8px;overflow:hidden;height:188px;} /* réduit */
.tablet-nav{background:#006937;padding:6px 9px;display:flex;align-items:center;justify-content:space-between;}
.tab-logo{font-size:8.5px;font-weight:800;color:#fff;letter-spacing:1px;}
.tab-body{padding:7px;}
.tab-title{font-size:7px;font-weight:700;color:#0f172a;margin-bottom:6px;}
.tab-row{
    display:flex;align-items:center;justify-content:space-between;
    padding:4px 0;border-bottom:1px solid #f1f5f9;font-size:6px;
}
.tab-row:last-child{border-bottom:none;}
.tab-ref{color:#475569;font-family:'Montserrat',sans-serif;}
.tab-badge{padding:1.5px 5px;border-radius:3px;font-size:5.5px;font-weight:700;font-family:'Montserrat',sans-serif;}
.tag-paid{background:#dcfce7;color:#16a34a;}
.tag-pend{background:#fef9c3;color:#ca8a04;}
.tag-prog{background:#dbeafe;color:#1d4ed8;}
.tab-amt{color:#0f172a;font-weight:700;font-family:'Montserrat',sans-serif;}
.tablet-home{width:28px;height:2px;background:#e2e5ea;border-radius:1px;margin:5px auto;}

@media(max-width:1100px){
    .hero-right{min-height:340px;}
    .device-desktop{left:60px;width:320px;}
    .device-phone{left:10px;width:110px;}
    .device-tablet{width:130px;}
}
@media(max-width:820px){
    .hero-inner{flex-direction:column;padding:32px 24px 48px;text-align:center;}
    .hero-left{width:100%;max-width:100%;}
    .hero-h1{font-size:32px;}
    .hero-desc{margin-left:auto;margin-right:auto;}
    .hero-cta{margin:0 auto;}
    .hero-right{width:100%;min-height:280px;}
    .hero-float-badge{display:none;}
    .device-desktop{left:50%;transform:translateX(-50%);width:280px;top:0;}
    .device-phone{left:0;width:95px;bottom:0;}
    .device-tablet{right:0;width:105px;bottom:0;}
}
</style>

<section class="hero">
    <div class="hero-inner">

      
        <div class="hero-left">
            <div class="hero-eyebrow">
                <div class="hero-eyebrow-bar"></div>
                <span class="hero-eyebrow-txt">Bienvenue sur Notre Plateforme</span>
            </div>

            <h1 class="hero-h1">
                Gestion de prestation de services<br>
                Maintenance Des Equipements<br>
                
            </h1>

            <h2 class="hero-desc">
                Soumettez vos demandes et suivez chaque intervention en temps réel.
            </h2>

            <a href="{{ url('formulaire_demande') }}" class="hero-cta">
                <i class="fa-solid fa-circle-right"></i>
                Soumettre une demande
            </a>
        </div>

     
        <div class="hero-right">


            <div class="device-phone">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <div class="ps-header">
                        <span class="ps-logo">ACSI</span>
                        <div class="ps-ava"></div>
                    </div>
                    <div class="ps-label">Bonjour, Utilisateur</div>
                    <div class="ps-label">Bienvenue sur votre espace client</div>
                    <div class="ps-status">
                        <div class="ps-dot"></div>
                        <span class="ps-stxt">En cours</span>
                    </div>
                    <div class="ps-refbox">
                        <div class="ps-ref-row">
                            <span class="ps-ref-l">Demande N001</span>
                            <span class="ps-ref-v">En attente</span>
                        </div>
                        <div class="ps-ref-n">Mon pc a un problème</div>
                    </div>
                    <div class="ps-btn">Voir mes demandes</div>
                </div>
                <div class="phone-home-bar"></div>
            </div>

           
            <div class="device-desktop">
                <div class="monitor-outer">
                    <div class="monitor-bar">
                        <div class="m-dot mr"></div>
                        <div class="m-dot my"></div>
                        <div class="m-dot mg"></div>
                    </div>
                    <div class="monitor-screen">
                        <div class="ms-nav">
                            <span class="ms-logo">ACSI</span>
                            <div class="ms-avatar">A</div>
                        </div>
                        <div class="ms-body">
                            <div class="ms-sidebar">
                                <div class="ms-sb-item on">Accueil</div>
                                <div class="ms-sb-item">Users</div>
                                <div class="ms-sb-item">Clients</div>
                                <div class="ms-sb-item">Demandes</div>
                                <div class="ms-sb-item">Interventions</div>
                            </div>
                            <div class="ms-main">
                                <div class="ms-title">Tableau de bord</div>
                                <div class="ms-stats">
                                    <div class="ms-stat"><div class="ms-stat-ico ico-g"></div><div class="ms-stat-v">50</div><div class="ms-stat-l">Utilisateurs</div></div>
                                    <div class="ms-stat"><div class="ms-stat-ico ico-y"></div><div class="ms-stat-v">40</div><div class="ms-stat-l">Clients</div></div>
                                    <div class="ms-stat"><div class="ms-stat-ico ico-b"></div><div class="ms-stat-v">30</div><div class="ms-stat-l">Demandes</div></div>
                                </div>
                                <div class="ms-charts">
                                    <div class="ms-chart">
                                        <div class="ms-chart-t">Évolution des demandes</div>
                                        <div class="ms-bars">
                                            <div class="ms-bar bl" style="height:38%"></div>
                                            <div class="ms-bar bm" style="height:55%"></div>
                                            <div class="ms-bar bl" style="height:40%"></div>
                                            <div class="ms-bar bw" style="height:65%"></div>
                                            <div class="ms-bar bm" style="height:90%"></div>
                                            <div class="ms-bar bl" style="height:60%"></div>
                                            <div class="ms-bar bm" style="height:75%"></div>
                                        </div>
                                    </div>
                                    <div class="ms-chart">
                                        <div class="ms-chart-t">Répartition par statuts</div>
                                        <div class="ms-donut">
                                            <svg viewBox="0 0 50 50" width="50" height="50">
                                                <circle cx="25" cy="25" r="16" fill="none" stroke="#e8edf2" stroke-width="8"/>
                                                <circle cx="25" cy="25" r="16" fill="none" stroke="#22c55e" stroke-width="8" stroke-dasharray="60 41" stroke-dashoffset="24" transform="rotate(-90 25 25)"/>
                                                <circle cx="25" cy="25" r="16" fill="none" stroke="#fbbf24" stroke-width="8" stroke-dasharray="20 81" stroke-dashoffset="-36" transform="rotate(-90 25 25)"/>
                                                <text x="25" y="28" text-anchor="middle" fill="#0f172a" font-size="7" font-weight="700" font-family="Montserrat,sans-serif">75%</text>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="monitor-stand"></div>
                <div class="monitor-base"></div>
            </div>

           
            <div class="device-tablet">
                <div class="tablet-screen">
                    <div class="tablet-nav">
                        <span class="tab-logo">ACSI</span>
                    </div>
                    <div class="tab-body">
                        <div class="tab-title">Factures</div>
                        <div class="tab-rows">
                            <div class="tab-row">
                                <span class="tab-ref">FAC-2026-001</span>
                                <span class="tab-badge tag-paid">Facturé</span>
                               
                            </div>
                            <div class="tab-row">
                                <span class="tab-ref">FAC-2026-002</span>
                                <span class="tab-badge tag-pend">En attente</span>
                               
                            </div>
                            <div class="tab-row">
                                <span class="tab-ref">FAC-2026-003</span>
                                <span class="tab-badge tag-paid">Facturé</span>
                               
                            </div>
                            <div class="tab-row">
                                <span class="tab-ref">FAC-2026-004</span>
                                <span class="tab-badge tag-pend">En attente</span>
                               
                            </div>
                            <div class="tab-row">
                                <span class="tab-ref">FAC-2026-005</span>
                                <span class="tab-badge tag-pend">En attente</span>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tablet-home"></div>
            </div>

        </div>
    </div>
</section>