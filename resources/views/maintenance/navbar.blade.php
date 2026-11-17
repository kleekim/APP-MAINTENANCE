<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap');
*{box-sizing:border-box;}
.acsi-nav{
    position:fixed;top:0;left:0;right:0;z-index:1000;
    background:#006937;
    height:72px;display:flex;align-items:center;
    font-family:'Montserrat',sans-serif;
    border-bottom:1px solid rgba(255,255,255,0.08);
}
.nav-inner{
    width:100%;max-width:1280px;margin:0 auto;
    padding:0 48px;display:flex;align-items:center;
    justify-content:space-between;
}

.nav-brand{display:flex;align-items:center;gap:12px;text-decoration:none;}
.nav-brand-logo{
    width:56px;height:56px;border-radius:50%;overflow:hidden;
    background:rgba(255,255,255,0.12);display:flex;align-items:center;justify-content:center;
}
.nav-brand-logo img{width:100%;height:100%;object-fit:cover;}
.nav-brand-texts{display:flex;flex-direction:column;}
.nav-brand-texts .t1{font-size:18px;font-weight:800;color:#fff;letter-spacing:1px;line-height:1;}
.nav-brand-texts .t2{font-size:9px;color:rgba(255,255,255,0.5);font-weight:500;line-height:1.4;max-width:180px;}

.nav-center{display:flex;align-items:center;gap:4px;list-style:none;margin:0;padding:0;}
.nav-center li a{
    display:flex;align-items:center;gap:7px;
    padding:8px 16px;border-radius:8px;
    font-size:14px;font-weight:500;
    color:rgba(255,255,255,0.8);text-decoration:none;
    position:relative;transition:color .2s,background .2s;
}
.nav-center li a:hover{color:#fff;background:rgba(255,255,255,0.08);}
.nav-center li a.active{color:#fff;}
.nav-center li a.active::after{
    content:'';position:absolute;bottom:2px;left:50%;transform:translateX(-50%);
    width:20px;height:2px;background:#f7be00;border-radius:2px;
}

.nav-btn{
    display:flex;align-items:center;gap:8px;
    padding:9px 22px;border-radius:8px;
    font-size:14px;font-weight:600;
    color:#fff;text-decoration:none;
    border:1.5px solid rgba(255,255,255,0.5);
    background:transparent;
    transition:background .2s,border-color .2s;
    font-family:'Montserrat',sans-serif;
}
.nav-btn:hover{background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.8);color:#fff;}

.hamburger{display:none;flex-direction:column;gap:5px;background:none;border:none;cursor:pointer;padding:0;}
.hamburger span{width:22px;height:2px;background:#fff;border-radius:2px;display:block;transition:.3s;}
.hamburger.open span:nth-child(1){transform:translateY(7px) rotate(45deg);}
.hamburger.open span:nth-child(2){opacity:0;}
.hamburger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg);}
@media(max-width:960px){
    .nav-brand-texts .t2{display:none;}
    .nav-center li a{font-size:13px;padding:7px 12px;}
}
@media(max-width:768px){
    .hamburger{display:flex;}
    .nav-center{
        position:fixed;top:0;right:-100%;bottom:0;width:260px;
        background:#004d28;flex-direction:column;justify-content:flex-start;
        padding:90px 24px 24px;gap:4px;
        box-shadow:-6px 0 24px rgba(0,0,0,.3);
        transition:right .35s cubic-bezier(.4,0,.2,1);
    }
    .nav-center.open{right:0;}
    .nav-center li{width:100%;}
    .nav-center li a{font-size:16px;padding:12px 16px;width:100%;}
    .nav-center li a.active::after{display:none;}
    .nav-btn{justify-content:center;width:100%;margin-top:12px;padding:13px;}
}
</style>

<nav class="acsi-nav">
    <div class="nav-inner">
        <a href="{{ url('/') }}" class="nav-brand">
            <div class="nav-brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="ACSI">
            </div>
            <div class="nav-brand-texts">
                <span class="t1">AGENCE CONGOLAISE DES SYSTÈMES D'INFORMATION</span>
                
            </div>
        </a>

        <button class="hamburger" aria-label="Menu" onclick="this.classList.toggle('open');document.querySelector('.nav-center').classList.toggle('open')">
            <span></span><span></span><span></span>
        </button>

        <ul class="nav-center">
            <li><a href="{{ url('/') }}" class="active"><i class="fa-solid fa-house"></i> Accueil</a></li>

            <li><a href="{{ route('login') }}"><i class="fa-regular fa-user"></i> Connexion</a></li>
            
        </ul>

       
    </div>
</nav> 