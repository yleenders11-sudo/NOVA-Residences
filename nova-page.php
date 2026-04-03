<?php
/**
 * Template Name: NOVA Residences
 * Volledig scherm pagina voor NOVA Residences website
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>NOVA Residences – Defined by Luxury. Driven by Excellence.</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<style>
:root{--gold:#C9A96E;--gold-light:#E8D5B0;--gold-dark:#8B6F3E;--ink:#0F0F0D;--ink-soft:#1E1E1A;--warm-white:#FAF8F4;--stone:#F0EBE1;--border:rgba(201,169,110,0.25)}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth}
body{font-family:'Jost',sans-serif;background:var(--ink);color:var(--warm-white);font-weight:300;overflow-x:hidden}
.page{display:none;min-height:100vh}.page.active{display:block}

/* ── NAV ── */
nav{position:fixed;top:0;left:0;right:0;z-index:200;display:flex;align-items:center;justify-content:space-between;padding:1.5rem 4rem;background:linear-gradient(to bottom,rgba(15,15,13,.92),transparent);transition:background .4s}
nav.scrolled{background:rgba(15,15,13,.97);border-bottom:1px solid var(--border)}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.5rem;font-weight:300;letter-spacing:.18em;color:var(--gold);text-decoration:none;cursor:pointer;line-height:1.1}
.nav-logo .sub{display:block;font-size:.52rem;letter-spacing:.45em;text-transform:uppercase;color:rgba(201,169,110,.65);font-family:'Jost',sans-serif;font-weight:300;margin-top:.15rem}
.nav-links{display:flex;gap:2.5rem;list-style:none;align-items:center}
.nav-links>li>a{font-size:.72rem;letter-spacing:.18em;text-transform:uppercase;color:var(--warm-white);text-decoration:none;opacity:.72;transition:opacity .2s,color .2s;cursor:pointer;display:block;padding:.25rem 0}
.nav-links>li>a:hover{opacity:1;color:var(--gold)}
.nav-cta{font-size:.7rem;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);text-decoration:none;border:1px solid var(--gold);padding:.55rem 1.3rem;transition:background .25s,color .25s;cursor:pointer}
.nav-cta:hover{background:var(--gold);color:var(--ink)}

/* ── NAV DROPDOWN — JS hover bridge ── */
.nav-has-dropdown{position:relative}
.nav-dropdown{
  position:absolute;top:calc(100% + 8px);left:50%;transform:translateX(-50%);
  background:rgba(12,12,10,.98);border:1px solid var(--border);
  min-width:560px;display:grid;grid-template-columns:1fr 1fr;
  opacity:0;visibility:hidden;pointer-events:none;
  transition:opacity .22s ease,visibility .22s ease,transform .22s ease;
  transform:translateX(-50%) translateY(-6px);
  z-index:300;
}
/* Invisible bridge fills gap between trigger and menu */
.nav-has-dropdown::after{
  content:'';position:absolute;top:100%;left:-40px;right:-40px;height:16px;
  z-index:299;
}
.nav-has-dropdown.dd-open .nav-dropdown{
  opacity:1;visibility:visible;pointer-events:all;
  transform:translateX(-50%) translateY(0);
}
.nav-dd-col{padding:1.4rem 1.6rem;border-right:1px solid var(--border)}
.nav-dd-col:last-child{border-right:none}
.nav-dd-head{font-size:.56rem;letter-spacing:.28em;text-transform:uppercase;color:var(--gold);margin-bottom:.9rem;padding-bottom:.6rem;border-bottom:1px solid var(--border)}
.nav-dd-item{display:block;font-size:.75rem;padding:.4rem 0;opacity:.58;color:var(--warm-white);cursor:pointer;transition:opacity .2s,color .2s,padding-left .15s;letter-spacing:.05em;white-space:nowrap}
.nav-dd-item:hover{opacity:1;color:var(--gold);padding-left:.35rem}

/* ── HERO ── */
.hero{height:100vh;position:relative;display:flex;align-items:flex-end;overflow:hidden}
.hero-slides{position:absolute;inset:0;z-index:0}
.hero-slide{position:absolute;inset:0;opacity:0;transition:opacity 1.8s ease;background-size:cover;background-position:center}
.hero-slide.active{opacity:1}
.hero-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(15,15,13,.78) 0%,rgba(15,15,13,.35) 55%,rgba(15,15,13,.1) 100%);z-index:1}
.hero-tagline-wrap{position:relative;z-index:2;padding:0 3rem 5.5rem;max-width:900px;animation:fadeUp 1.4s ease-out .5s both}
@keyframes fadeUp{from{opacity:0;transform:translateY(40px)}to{opacity:1;transform:translateY(0)}}
.hero-tagline{font-family:'Cormorant Garamond',serif;font-size:clamp(4rem,8.5vw,8rem);font-weight:300;line-height:1.0;color:var(--warm-white);letter-spacing:-.01em}
.hero-tagline em{font-style:italic;color:var(--gold)}
.hero-actions{display:flex;gap:1rem;align-items:center;margin-top:2.5rem}
.hero-slide-dots{position:absolute;right:4rem;bottom:5rem;z-index:3;display:flex;flex-direction:column;gap:.5rem}
.hero-dot{width:5px;height:5px;border-radius:50%;background:rgba(255,255,255,.3);cursor:pointer;transition:background .3s,transform .3s}
.hero-dot.active{background:var(--gold);transform:scale(1.4)}
.hero-scroll{position:absolute;left:50%;bottom:2rem;transform:translateX(-50%);z-index:2;display:flex;flex-direction:column;align-items:center;gap:.5rem;font-size:.58rem;letter-spacing:.3em;text-transform:uppercase;opacity:.4}
.scroll-line{width:1px;height:45px;background:var(--gold);animation:scrollPulse 2s ease-in-out infinite}
@keyframes scrollPulse{0%,100%{transform:scaleY(1);opacity:1}50%{transform:scaleY(.5);opacity:.3}}

/* SHARED */
.section-eyebrow{font-size:.65rem;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);margin-bottom:1rem;display:flex;align-items:center;gap:1rem}
.section-eyebrow::before{content:'';display:block;width:28px;height:1px;background:var(--gold)}
.section-title{font-family:'Cormorant Garamond',serif;font-size:clamp(2rem,4vw,3.4rem);font-weight:300;line-height:1.15}
.section-title em{font-style:italic;color:var(--gold)}
.btn-primary{display:inline-block;text-decoration:none;background:var(--gold);color:var(--ink);font-size:.7rem;letter-spacing:.2em;text-transform:uppercase;padding:.85rem 2rem;font-weight:500;transition:background .25s;cursor:pointer;border:none;font-family:'Jost',sans-serif}
.btn-primary:hover{background:var(--gold-light)}
.btn-ghost{display:inline-block;text-decoration:none;border:1px solid rgba(255,255,255,.3);color:var(--warm-white);font-size:.7rem;letter-spacing:.2em;text-transform:uppercase;padding:.85rem 2rem;transition:border-color .25s,color .25s;cursor:pointer;background:none;font-family:'Jost',sans-serif}
.btn-ghost:hover{border-color:var(--gold);color:var(--gold)}
.divider{width:55px;height:1px;background:var(--gold);margin:1.8rem 0}
.reveal{opacity:0;transform:translateY(22px);transition:opacity .7s ease,transform .7s ease}
.reveal.visible{opacity:1;transform:translateY(0)}
.rd1{transition-delay:.1s}.rd2{transition-delay:.2s}.rd3{transition-delay:.3s}

/* MARQUEE */
.marquee-wrap{background:var(--gold);padding:.85rem 0;overflow:hidden}
.marquee-track{display:flex;gap:3rem;white-space:nowrap;animation:marquee 30s linear infinite}
@keyframes marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.marquee-item{font-size:.68rem;letter-spacing:.25em;text-transform:uppercase;color:var(--ink);font-weight:500;display:flex;align-items:center;gap:1.5rem}
.marquee-item::after{content:'◆';font-size:.42rem}

/* SEARCH */
.search-section{background:var(--ink-soft);padding:2.8rem 4rem;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.search-label{font-size:.65rem;letter-spacing:.28em;text-transform:uppercase;color:var(--gold);margin-bottom:1.3rem}
.search-bar{display:grid;grid-template-columns:1fr 1fr 1fr auto;border:1px solid var(--border)}
.search-field{padding:1rem 1.4rem;border-right:1px solid var(--border)}
.search-field label{display:block;font-size:.58rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.35rem}
.search-field select{background:none;border:none;outline:none;color:var(--warm-white);font-family:'Jost',sans-serif;font-size:.88rem;font-weight:300;width:100%;cursor:pointer}
.search-field select option{background:var(--ink-soft)}
.search-btn{background:var(--gold);border:none;padding:0 2.2rem;font-family:'Jost',sans-serif;font-size:.68rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink);font-weight:500;cursor:pointer;transition:background .2s}
.search-btn:hover{background:var(--gold-light)}

/* LISTINGS */
.listings-section{background:var(--ink);padding:6rem 4rem}
.listings-header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:3rem}
.listings-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.5px}
.listing-card{position:relative;overflow:hidden;aspect-ratio:3/4;cursor:pointer}
.listing-card:first-child{grid-row:span 2;aspect-ratio:auto}
.listing-img{width:100%;height:100%;object-fit:cover;transition:transform .7s ease}
.listing-card:hover .listing-img{transform:scale(1.06)}
.listing-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(15,15,13,.93) 0%,rgba(15,15,13,.12) 60%,transparent 100%);transition:background .4s}
.listing-card:hover .listing-overlay{background:linear-gradient(to top,rgba(15,15,13,.97) 0%,rgba(15,15,13,.3) 70%,transparent 100%)}
.listing-info{position:absolute;bottom:0;left:0;right:0;padding:1.8rem;transform:translateY(4px);transition:transform .4s ease}
.listing-card:hover .listing-info{transform:translateY(0)}
.listing-badge{display:inline-block;font-size:.56rem;letter-spacing:.2em;text-transform:uppercase;color:var(--ink);background:var(--gold);padding:.28rem .65rem;margin-bottom:.7rem}
.listing-name{font-family:'Cormorant Garamond',serif;font-size:1.35rem;font-weight:300;line-height:1.2;margin-bottom:.35rem}
.listing-location{font-size:.68rem;letter-spacing:.1em;opacity:.58;margin-bottom:.7rem}
.listing-price{font-family:'Cormorant Garamond',serif;font-size:1.55rem;color:var(--gold)}
.listing-details{display:flex;gap:1rem;margin-top:.5rem;font-size:.67rem;opacity:0;transition:opacity .4s}
.listing-card:hover .listing-details{opacity:.7}
.listing-photo-btn{position:absolute;top:1rem;right:1rem;background:rgba(15,15,13,.82);border:1px solid var(--gold);color:var(--gold);font-family:'Jost',sans-serif;font-size:.58rem;letter-spacing:.14em;text-transform:uppercase;padding:.38rem .85rem;opacity:0;transition:opacity .3s,background .2s;cursor:pointer}
.listing-card:hover .listing-photo-btn{opacity:1}
.listing-photo-btn:hover{background:var(--gold);color:var(--ink)}

/* STATS */
.stats-section{background:var(--ink-soft);border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr)}
.stat-item{padding:2.8rem 2rem;border-right:1px solid var(--border);text-align:center}
.stat-item:last-child{border-right:none}
.stat-number{font-family:'Cormorant Garamond',serif;font-size:3.2rem;font-weight:300;color:var(--gold);line-height:1;margin-bottom:.4rem}
.stat-label{font-size:.65rem;letter-spacing:.18em;text-transform:uppercase;opacity:.52}

/* ABOUT */
.about-section{display:grid;grid-template-columns:1fr 1fr}
.about-image{overflow:hidden}
.about-image img{width:100%;height:100%;object-fit:cover}
.about-content{padding:6rem 5rem;background:var(--ink-soft);display:flex;flex-direction:column;justify-content:center;border-top:1px solid var(--border);border-bottom:1px solid var(--border)}
.about-content p{font-size:.97rem;line-height:2;opacity:.7;margin:1.4rem 0}
.about-content p.lead{font-family:'Cormorant Garamond',serif;font-size:1.2rem;font-style:italic;color:var(--gold-light);opacity:.92}

/* SERVICES */
.services-section{background:var(--ink);padding:6rem 4rem}
.services-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;margin-top:3rem;border:1px solid var(--border)}
.service-card{padding:2.8rem 2.2rem;border-right:1px solid var(--border);transition:background .3s;position:relative;overflow:hidden}
.service-card:nth-child(3),.service-card:last-child{border-right:none}
.service-card::before{content:'';position:absolute;bottom:0;left:0;right:0;height:2px;background:var(--gold);transform:scaleX(0);transform-origin:left;transition:transform .4s}
.service-card:hover{background:var(--ink-soft)}
.service-card:hover::before{transform:scaleX(1)}
.service-num{font-family:'Cormorant Garamond',serif;font-size:2.8rem;font-weight:300;color:var(--border);line-height:1;margin-bottom:1.3rem;transition:color .3s}
.service-card:hover .service-num{color:var(--gold);opacity:.3}
.service-title{font-family:'Cormorant Garamond',serif;font-size:1.4rem;font-weight:400;margin-bottom:.9rem}
.service-text{font-size:.83rem;line-height:1.9;opacity:.58}

/* TESTIMONIALS */
.testimonials-section{background:var(--stone);padding:6rem 4rem;overflow:hidden}
.testimonials-header{text-align:center;margin-bottom:3.5rem}
.testimonials-header .section-title{color:var(--ink)}
.testimonials-header .section-eyebrow{justify-content:center}
.testimonials-header .section-eyebrow::before{display:none}
.testimonial-track-wrap{overflow:hidden}
.testimonial-track{display:flex;gap:2rem;transition:transform .6s cubic-bezier(.25,.46,.45,.94)}
.testimonial-card{background:#fff;border:1px solid rgba(139,111,62,.12);padding:2.8rem;flex:0 0 calc(33.333% - 1.35rem);min-width:calc(33.333% - 1.35rem);position:relative}
.testimonial-card::before{content:'"';font-family:'Cormorant Garamond',serif;font-size:5.5rem;color:var(--gold);opacity:.15;position:absolute;top:-.4rem;left:1.3rem;line-height:1}
.stars-row{color:var(--gold-dark);font-size:.82rem;letter-spacing:.2rem;margin-bottom:1.1rem}
.testimonial-text{font-family:'Cormorant Garamond',serif;font-size:1.07rem;font-style:italic;color:var(--ink);line-height:1.75;margin-bottom:1.4rem}
.testimonial-meta{border-top:1px solid rgba(139,111,62,.18);padding-top:.9rem}
.testimonial-meta-name{font-size:.72rem;letter-spacing:.1em;text-transform:uppercase;color:var(--ink);font-weight:500}
.testimonial-meta-detail{font-size:.7rem;opacity:.52;color:var(--ink);margin-top:.2rem}
.tc-controls{display:flex;justify-content:center;align-items:center;gap:1.5rem;margin-top:2.5rem}
.tc-btn{background:none;border:1px solid rgba(139,111,62,.4);color:var(--gold-dark);width:42px;height:42px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1.1rem;transition:background .2s}
.tc-btn:hover{background:var(--gold-dark);color:#fff;border-color:var(--gold-dark)}
.tc-dots{display:flex;gap:.5rem}
.tc-dot{width:6px;height:6px;border-radius:50%;background:rgba(139,111,62,.28);cursor:pointer;transition:background .2s,transform .2s}
.tc-dot.active{background:var(--gold-dark);transform:scale(1.3)}

/* RECENT */
.recent-section{background:var(--ink-soft);padding:6rem 4rem}
.recent-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;margin-top:2.8rem}
.recent-card{background:var(--ink);overflow:hidden;transition:transform .3s;cursor:pointer}
.recent-card:hover{transform:translateY(-5px)}
.recent-img-wrap{aspect-ratio:4/3;overflow:hidden}
.recent-img-wrap img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.recent-card:hover .recent-img-wrap img{transform:scale(1.06)}
.recent-body{padding:1.4rem}
.recent-type{font-size:.58rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.55rem}
.recent-name{font-family:'Cormorant Garamond',serif;font-size:1.1rem;font-weight:400;margin-bottom:.35rem;line-height:1.3}
.recent-loc{font-size:.7rem;opacity:.48;margin-bottom:.9rem}
.recent-footer{display:flex;justify-content:space-between;align-items:center;padding-top:.9rem;border-top:1px solid var(--border)}
.recent-price{font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:var(--gold)}
.recent-specs{font-size:.68rem;opacity:.48}

/* CONTACT SPLIT */
.contact-section{display:grid;grid-template-columns:1fr 1fr}
.contact-image{position:relative;overflow:hidden;min-height:580px}
.contact-image img{width:100%;height:100%;object-fit:cover}
.contact-image-overlay{position:absolute;inset:0;background:linear-gradient(to right,transparent 40%,rgba(15,15,13,1) 100%)}
.contact-form-wrap{background:var(--ink);padding:6rem 5rem;display:flex;flex-direction:column;justify-content:center}
.form-group{margin-bottom:1.4rem}
.form-group label{display:block;font-size:.62rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.45rem}
.form-group input,.form-group textarea,.form-group select{width:100%;background:none;border:none;border-bottom:1px solid var(--border);color:var(--warm-white);font-family:'Jost',sans-serif;font-size:.88rem;font-weight:300;padding:.65rem 0;outline:none;transition:border-color .2s}
.form-group input:focus,.form-group textarea:focus,.form-group select:focus{border-bottom-color:var(--gold)}
.form-group textarea{resize:none;height:85px}
.form-group select option{background:var(--ink)}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:1.4rem}
.submit-btn{background:none;border:1px solid var(--gold);color:var(--gold);font-family:'Jost',sans-serif;font-size:.7rem;letter-spacing:.2em;text-transform:uppercase;padding:.95rem 2.4rem;cursor:pointer;transition:background .25s,color .25s;margin-top:.9rem}
.submit-btn:hover{background:var(--gold);color:var(--ink)}

/* FOOTER */
footer{background:#080807;padding:4.5rem 4rem 2.5rem;border-top:1px solid var(--border)}
.footer-top{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:3.5rem;margin-bottom:3.5rem}
.footer-brand p{font-size:.82rem;line-height:1.9;opacity:.48;margin-top:1.1rem;max-width:270px}
.footer-logo{font-family:'Cormorant Garamond',serif;font-size:1.65rem;font-weight:300;letter-spacing:.12em;color:var(--gold)}
.footer-sub{font-size:.5rem;letter-spacing:.4em;text-transform:uppercase;color:rgba(201,169,110,.55);display:block;margin-top:.2rem;font-family:'Jost',sans-serif}
.footer-col h4{font-size:.62rem;letter-spacing:.25em;text-transform:uppercase;color:var(--gold);margin-bottom:1.3rem}
.footer-col ul{list-style:none}
.footer-col ul li{margin-bottom:.75rem}
.footer-col ul li a{font-size:.82rem;opacity:.48;text-decoration:none;color:inherit;transition:opacity .2s,color .2s;cursor:pointer}
.footer-col ul li a:hover{opacity:1;color:var(--gold)}
.footer-bottom{border-top:1px solid var(--border);padding-top:1.8rem;display:flex;justify-content:space-between;align-items:center;font-size:.7rem;opacity:.38;letter-spacing:.07em}
.social-links{display:flex;gap:1.5rem}
.social-links a{color:inherit;text-decoration:none;font-size:.7rem;letter-spacing:.14em;text-transform:uppercase;cursor:pointer;transition:color .2s,opacity .2s}
.social-links a:hover{color:var(--gold);opacity:1}

/* PROPERTY DETAIL */
#page-property{padding-top:90px;background:var(--ink)}
.prop-hero{position:relative;height:72vh;overflow:hidden}
.prop-hero-img{width:100%;height:100%;object-fit:cover;transition:opacity .3s}
.prop-hero-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(15,15,13,.88),transparent 60%)}
.prop-hero-back{position:absolute;top:1.8rem;left:4rem;z-index:10;display:flex;align-items:center;gap:.6rem;font-size:.7rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);cursor:pointer;background:none;border:none;font-family:'Jost',sans-serif;transition:opacity .2s}
.prop-hero-back::before{content:'←';font-size:1rem}
.prop-hero-back:hover{opacity:.7}
.g-nav{position:absolute;top:50%;transform:translateY(-50%);z-index:10;background:rgba(15,15,13,.55);border:1px solid var(--gold);color:var(--gold);width:44px;height:44px;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1.3rem;transition:background .2s;line-height:1}
.g-nav:hover{background:var(--gold);color:var(--ink)}
.g-prev{left:1.8rem}.g-next{right:1.8rem}
.prop-counter{position:absolute;bottom:1.8rem;right:4rem;font-size:.7rem;letter-spacing:.14em;color:var(--warm-white);opacity:.68;z-index:10}
.gallery-strip{display:flex;gap:.45rem;padding:.9rem 4rem;background:var(--ink-soft);border-bottom:1px solid var(--border);overflow-x:auto}
.gallery-strip::-webkit-scrollbar{height:3px}
.gallery-strip::-webkit-scrollbar-thumb{background:var(--gold);border-radius:2px}
.g-thumb{width:115px;height:74px;object-fit:cover;cursor:pointer;opacity:.42;transition:opacity .25s;flex-shrink:0;border:2px solid transparent}
.g-thumb.active{opacity:1;border-color:var(--gold)}
.g-thumb:hover{opacity:.8}
.prop-body{display:grid;grid-template-columns:1fr 350px;gap:3.5rem;padding:3.5rem 4rem 5.5rem;max-width:1380px;margin:0 auto}
.prop-eyebrow{font-size:.65rem;letter-spacing:.3em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem;display:flex;align-items:center;gap:.8rem}
.prop-eyebrow::before{content:'';display:block;width:22px;height:1px;background:var(--gold)}
.prop-title{font-family:'Cormorant Garamond',serif;font-size:clamp(2rem,4vw,3rem);font-weight:300;line-height:1.1;margin-bottom:.55rem}
.prop-address{font-size:.83rem;opacity:.48;letter-spacing:.1em;margin-bottom:1.8rem}
.prop-specs-row{display:flex;gap:1.8rem;padding:1.3rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border);margin-bottom:2rem;flex-wrap:wrap}
.prop-spec-val{font-family:'Cormorant Garamond',serif;font-size:1.55rem;color:var(--gold);display:block;line-height:1}
.prop-spec-lbl{font-size:.6rem;letter-spacing:.15em;text-transform:uppercase;opacity:.48;margin-top:.28rem;display:block}
.prop-description{font-size:.93rem;line-height:2;opacity:.68;margin-bottom:2.2rem}
.prop-features{display:grid;grid-template-columns:1fr 1fr;gap:.55rem .7rem;margin-bottom:2.2rem}
.prop-feature{font-size:.8rem;opacity:.62;display:flex;align-items:center;gap:.45rem}
.prop-feature::before{content:'◆';font-size:.38rem;color:var(--gold)}
.prop-map-label{font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.7rem}
.prop-map{width:100%;height:300px;border:1px solid var(--border);margin-bottom:2.2rem;filter:grayscale(25%) contrast(1.05)}
.prop-sidebar{position:sticky;top:106px;height:fit-content}
.prop-price-card{background:var(--ink-soft);border:1px solid var(--border);padding:1.8rem;margin-bottom:1.3rem}
.prop-price-lbl{font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;opacity:.48;margin-bottom:.35rem}
.prop-price-big{font-family:'Cormorant Garamond',serif;font-size:2.3rem;color:var(--gold);line-height:1;margin-bottom:.9rem}
.prop-status{display:inline-block;font-size:.6rem;letter-spacing:.15em;text-transform:uppercase;padding:.32rem .75rem;background:rgba(201,169,110,.1);color:var(--gold);border:1px solid var(--border);margin-bottom:1.3rem}
.prop-cta{width:100%;background:var(--gold);border:none;color:var(--ink);font-family:'Jost',sans-serif;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;padding:.95rem;cursor:pointer;transition:background .25s;margin-bottom:.7rem;font-weight:500}
.prop-cta:hover{background:var(--gold-light)}
.prop-cta-ghost{width:100%;background:none;border:1px solid var(--border);color:var(--warm-white);font-family:'Jost',sans-serif;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase;padding:.95rem;cursor:pointer;transition:border-color .25s}
.prop-cta-ghost:hover{border-color:var(--gold);color:var(--gold)}
.agent-card{background:var(--ink-soft);border:1px solid var(--border);padding:1.4rem}
.agent-header{display:flex;align-items:center;gap:.9rem;margin-bottom:.9rem}
.agent-avatar{width:50px;height:50px;border-radius:50%;object-fit:cover;border:2px solid var(--gold)}
.agent-name{font-family:'Cormorant Garamond',serif;font-size:1.05rem;font-weight:400}
.agent-title-role{font-size:.62rem;letter-spacing:.1em;opacity:.48;text-transform:uppercase}
.agent-info{font-size:.78rem;opacity:.58;line-height:2}
.sothebys-badge{display:block;padding-top:1rem;margin-top:1rem;border-top:1px solid var(--border);font-size:.62rem;letter-spacing:.08em;opacity:.55}

/* SUBPAGES */
.subpage{padding-top:115px;min-height:100vh;background:var(--ink)}
.subpage-hero{padding:3.5rem 4rem 4.5rem;background:linear-gradient(to bottom,var(--ink-soft),var(--ink));border-bottom:1px solid var(--border)}
.subpage-grid{padding:4.5rem 4rem;display:grid;grid-template-columns:repeat(3,1fr);gap:1.8rem}
.subpage-card{background:var(--ink-soft);border:1px solid var(--border);overflow:hidden;transition:transform .3s,border-color .3s;cursor:pointer}
.subpage-card:hover{transform:translateY(-4px);border-color:var(--gold)}
.subpage-card-img{aspect-ratio:16/9;overflow:hidden}
.subpage-card-img img{width:100%;height:100%;object-fit:cover;transition:transform .5s}
.subpage-card:hover .subpage-card-img img{transform:scale(1.05)}
.subpage-card-body{padding:1.4rem}
.subpage-card-type{font-size:.58rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.45rem}
.subpage-card-name{font-family:'Cormorant Garamond',serif;font-size:1.25rem;font-weight:400;margin-bottom:.35rem}
.subpage-card-loc{font-size:.72rem;opacity:.48;margin-bottom:.9rem}
.subpage-card-footer{display:flex;justify-content:space-between;align-items:center;padding-top:.9rem;border-top:1px solid var(--border)}
.subpage-card-price{font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:var(--gold)}
.diensten-grid{padding:4.5rem 4rem;display:grid;grid-template-columns:1fr 1fr;gap:1.8rem}
.dienst-item{padding:2.8rem;background:var(--ink-soft);border:1px solid var(--border);position:relative;overflow:hidden}
.dienst-item::after{content:'';position:absolute;bottom:0;left:0;width:0;height:2px;background:var(--gold);transition:width .5s}
.dienst-item:hover::after{width:100%}
.dienst-num{font-family:'Cormorant Garamond',serif;font-size:3.5rem;font-weight:300;color:rgba(201,169,110,.1);position:absolute;top:.7rem;right:1.3rem;line-height:1}
.dienst-title{font-family:'Cormorant Garamond',serif;font-size:1.5rem;margin-bottom:.9rem}
.dienst-text{font-size:.85rem;line-height:2;opacity:.62}
.over-split{display:grid;grid-template-columns:1fr 1fr}
.over-img{overflow:hidden}
.over-img img{width:100%;height:100%;object-fit:cover}
.over-text{padding:5rem;background:var(--ink-soft);display:flex;flex-direction:column;justify-content:center}
.over-text p{font-size:.93rem;line-height:2;opacity:.68;margin-bottom:1.4rem}
.over-text .lead{font-family:'Cormorant Garamond',serif;font-size:1.18rem;font-style:italic;color:var(--gold-light);opacity:.92}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5px}
.team-card{background:var(--ink-soft);padding:2rem;text-align:center;border:1px solid var(--border)}
.team-avatar{width:80px;height:80px;border-radius:50%;object-fit:cover;border:2px solid var(--gold);margin:0 auto 1rem}
.team-name{font-family:'Cormorant Garamond',serif;font-size:1.08rem;margin-bottom:.28rem}
.team-role{font-size:.62rem;letter-spacing:.15em;text-transform:uppercase;opacity:.48}
.team-bio{font-size:.78rem;opacity:.52;margin-top:.75rem;line-height:1.8}
.contact-full{padding:4.5rem 4rem;display:grid;grid-template-columns:1fr 1fr;gap:5rem}
.contact-info-item{margin-bottom:1.4rem;padding-bottom:1.4rem;border-bottom:1px solid var(--border)}
.contact-info-label{font-size:.6rem;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);margin-bottom:.28rem}
.contact-info-val{font-size:.93rem;opacity:.72;line-height:1.8}
.legal-body{padding:3rem 4rem 5.5rem;max-width:740px}
.legal-section-title{font-family:'Cormorant Garamond',serif;font-size:1.35rem;margin-bottom:.9rem;color:var(--gold)}
.legal-p{font-size:.88rem;line-height:2;opacity:.62;margin-bottom:1.4rem}

/* LIGHTBOX */
.lightbox{position:fixed;inset:0;z-index:999;background:rgba(0,0,0,.95);display:none;align-items:center;justify-content:center;flex-direction:column}
.lightbox.open{display:flex}
.lightbox-img-wrap{max-width:90vw;max-height:80vh}
.lightbox-img{max-width:90vw;max-height:75vh;object-fit:contain;display:block}
.lb-close{position:fixed;top:1.4rem;right:1.8rem;font-size:1.4rem;color:var(--warm-white);cursor:pointer;opacity:.58;background:none;border:none;font-family:'Jost',sans-serif;transition:opacity .2s;z-index:1000}
.lb-close:hover{opacity:1}
.lb-nav{position:fixed;top:50%;transform:translateY(-50%);background:none;border:1px solid rgba(255,255,255,.2);color:var(--warm-white);width:50px;height:50px;font-size:1.35rem;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:border-color .2s,background .2s}
.lb-nav:hover{border-color:var(--gold);background:rgba(201,169,110,.1)}
.lb-prev{left:1.3rem}.lb-next{right:1.3rem}
.lb-caption{color:var(--warm-white);font-size:.72rem;letter-spacing:.1em;opacity:.45;margin-top:.75rem;text-align:center}
.lb-strip{display:flex;gap:.45rem;margin-top:.75rem;max-width:90vw;padding:.35rem 0;overflow-x:auto}
.lb-strip::-webkit-scrollbar{height:3px}
.lb-strip::-webkit-scrollbar-thumb{background:var(--gold)}
.lb-thumb{width:75px;height:50px;object-fit:cover;cursor:pointer;opacity:.38;transition:opacity .2s;border:2px solid transparent;flex-shrink:0}
.lb-thumb.active{opacity:1;border-color:var(--gold)}
.lb-thumb:hover{opacity:.8}

@media(max-width:1024px){
  nav{padding:1.1rem 2rem}
  .footer-top{grid-template-columns:1fr 1fr}
  .listings-grid,.services-grid{grid-template-columns:1fr 1fr}
  .listing-card:first-child{grid-row:auto;aspect-ratio:3/4}
  .recent-grid,.subpage-grid,.team-grid{grid-template-columns:repeat(2,1fr)}
  .about-section,.contact-section,.over-split,.prop-body,.contact-full{grid-template-columns:1fr}
  .stats-grid{grid-template-columns:repeat(2,1fr)}
  .search-bar{grid-template-columns:1fr 1fr}
  .hero-tagline-wrap{padding:0 2rem 4rem}
  .prop-sidebar{position:static}
  .diensten-grid{grid-template-columns:1fr}
  .testimonial-card{flex:0 0 100%;min-width:100%}
  .nav-dropdown{min-width:90vw;grid-template-columns:1fr}
}
</style>
</head>
<body>

<!-- NAV -->
<nav id="navbar">
  <a class="nav-logo" onclick="go('home')">
    NOVA <em style="font-style:italic">Residences</em>
    <span class="sub">Exclusive Real Estate</span>
  </a>
  <ul class="nav-links">
    <li class="nav-has-dropdown" id="navPropertiesItem">
      <a id="navPropertiesBtn">Properties ▾</a>
      <div class="nav-dropdown" id="navDropdown">
        <div class="nav-dd-col">
          <div class="nav-dd-head">By Category</div>
          <span class="nav-dd-item" onclick="go('woningen');closeDropdown()">All Properties</span>
          <span class="nav-dd-item" onclick="go('villas');closeDropdown()">Villas &amp; Estates</span>
          <span class="nav-dd-item" onclick="go('penthouses');closeDropdown()">Penthouses</span>
          <span class="nav-dd-item" onclick="go('appartementen');closeDropdown()">Apartments</span>
          <span class="nav-dd-item" onclick="go('nieuwbouw');closeDropdown()">New Development</span>
        </div>
        <div class="nav-dd-col">
          <div class="nav-dd-head">By Location</div>
          <span class="nav-dd-item" onclick="filterByLocation('Amsterdam');closeDropdown()">Amsterdam</span>
          <span class="nav-dd-item" onclick="filterByLocation('Blaricum');closeDropdown()">Blaricum &amp; 't Gooi</span>
          <span class="nav-dd-item" onclick="filterByLocation('Wassenaar');closeDropdown()">Wassenaar</span>
          <span class="nav-dd-item" onclick="filterByLocation('Tuscany');closeDropdown()">Tuscany, Italy</span>
          <span class="nav-dd-item" onclick="filterByLocation('Provence');closeDropdown()">Provence, France</span>
          <span class="nav-dd-item" onclick="filterByLocation('London');closeDropdown()">London, England</span>
          <span class="nav-dd-item" onclick="filterByLocation('New York');closeDropdown()">New York, USA</span>
          <span class="nav-dd-item" onclick="filterByLocation('Miami');closeDropdown()">Miami, USA</span>
          <span class="nav-dd-item" onclick="filterByLocation('Paris');closeDropdown()">Paris, France</span>
          <span class="nav-dd-item" onclick="filterByLocation('Portugal');closeDropdown()">Portugal</span>
        </div>
      </div>
    </li>
    <li><a onclick="go('diensten')">Services</a></li>
    <li><a onclick="go('over')">About</a></li>
    <li><a onclick="go('contact')">Contact</a></li>
  </ul>
  <a class="nav-cta" onclick="go('contact')">Get in Touch</a>
</nav>

<!-- ═══ HOME ═══ -->
<div id="page-home" class="page active">

  <section class="hero">
    <div class="hero-slides" id="heroSlides"></div>
    <div class="hero-overlay"></div>
    <div class="hero-tagline-wrap">
      <div class="hero-tagline">Defined by<br><em>luxury</em>,<br>driven by<br>excellence.</div>
      <div class="hero-actions">
        <button class="btn-primary" onclick="go('woningen')">View Properties</button>
        <button class="btn-ghost" onclick="go('over')">Our Story</button>
      </div>
    </div>
    <div class="hero-slide-dots" id="heroDots"></div>
    <div class="hero-scroll"><div class="scroll-line"></div>Scroll</div>
  </section>

  <div class="marquee-wrap"><div class="marquee-track">
    <div class="marquee-item">Exclusive Estates</div><div class="marquee-item">Penthouse Residences</div><div class="marquee-item">Country Houses</div><div class="marquee-item">Canal Mansions</div><div class="marquee-item">Private Villas</div><div class="marquee-item">Listed Monuments</div>
    <div class="marquee-item">Exclusive Estates</div><div class="marquee-item">Penthouse Residences</div><div class="marquee-item">Country Houses</div><div class="marquee-item">Canal Mansions</div><div class="marquee-item">Private Villas</div><div class="marquee-item">Listed Monuments</div>
  </div></div>

  <div class="search-section">
    <div class="search-label">Find Your Dream Residence</div>
    <div class="search-bar">
      <div class="search-field">
        <label>Location</label>
        <select id="searchLocation">
          <option value="">All Locations</option>
          <option value="Amsterdam">Amsterdam</option>
          <option value="Blaricum">Blaricum &amp; 't Gooi</option>
          <option value="Wassenaar">Wassenaar</option>
          <option value="Noordwijk">Noordwijk</option>
          <option value="Tuscany">Tuscany, Italy</option>
          <option value="Provence">Provence, France</option>
          <option value="London">London, England</option>
          <option value="New York">New York, USA</option>
          <option value="Miami">Miami, USA</option>
          <option value="Paris">Paris, France</option>
          <option value="Portugal">Portugal</option>
        </select>
      </div>
      <div class="search-field">
        <label>Property Type</label>
        <select id="searchType">
          <option value="">All Types</option>
          <option value="Canal House">Canal House</option>
          <option value="Penthouse">Penthouse</option>
          <option value="Villa">Villa</option>
          <option value="Estate">Country Estate</option>
          <option value="Apartment">Apartment</option>
        </select>
      </div>
      <div class="search-field">
        <label>Max. Price</label>
        <select id="searchPrice">
          <option value="">No limit</option>
          <option value="2000000">€ 2,000,000</option>
          <option value="5000000">€ 5,000,000</option>
          <option value="10000000">€ 10,000,000</option>
          <option value="20000000">€ 20,000,000</option>
        </select>
      </div>
      <button class="search-btn" onclick="runSearch()">Search</button>
    </div>
  </div>

  <section class="listings-section">
    <div class="listings-header reveal">
      <div><div class="section-eyebrow">Featured Properties</div><h2 class="section-title">Exceptional <em>Residences</em></h2></div>
      <button class="btn-ghost" onclick="go('woningen')">All Properties</button>
    </div>
    <div class="listings-grid" id="homeGrid"></div>
  </section>

  <div class="stats-section"><div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-number">340+</div><div class="stat-label">Properties Sold</div></div>
    <div class="stat-item reveal rd1"><div class="stat-number">€ 2.1B</div><div class="stat-label">Total Transaction Value</div></div>
    <div class="stat-item reveal rd2"><div class="stat-number">18 yrs</div><div class="stat-label">Luxury Real Estate Expertise</div></div>
    <div class="stat-item reveal rd3"><div class="stat-number">97%</div><div class="stat-label">Client Satisfaction</div></div>
  </div></div>

  <div class="about-section">
    <div class="about-image"><img src="https://images.unsplash.com/photo-1600047509358-9dc75507daeb?w=1200&q=90" alt="About NOVA"></div>
    <div class="about-content">
      <div class="section-eyebrow reveal">About NOVA Residences</div>
      <h2 class="section-title reveal">More than property<br>— <em>legacy</em></h2>
      <div class="divider"></div>
      <p class="lead reveal">We believe that an exceptional home is more than stone and glass — it is the very embodiment of a way of life.</p>
      <p class="reveal">NOVA Residences guides discerning buyers and sellers through every stage of the journey. Our advisors combine deep market knowledge with a personal approach built on discretion, integrity, and trust.</p>
      <button class="btn-ghost reveal" onclick="go('over')" style="margin-top:.5rem">Discover Our Story</button>
    </div>
  </div>

  <section class="services-section">
    <div class="reveal"><div class="section-eyebrow">Our Services</div><h2 class="section-title">Complete guidance,<br><em>from first step to final key</em></h2></div>
    <div class="services-grid">
      <div class="service-card reveal"><div class="service-num">01</div><div class="service-title">Buyer Representation</div><p class="service-text">We proactively source properties matching your exact requirements — including off-market opportunities exclusively through our private network of developers, architects, and private sellers.</p></div>
      <div class="service-card reveal rd1"><div class="service-num">02</div><div class="service-title">Sales Agency</div><p class="service-text">From professional staging and aerial cinematography to targeted marketing among a carefully curated pool of qualified buyers — maximum value and a swift, seamless transaction.</p></div>
      <div class="service-card reveal rd2"><div class="service-num">03</div><div class="service-title">Valuation &amp; Advisory</div><p class="service-text">Precise valuations grounded in real-time market data, comparative analysis, and location intelligence — delivering the strategic insight you need to act with confidence.</p></div>
    </div>
    <div style="text-align:center;margin-top:2.8rem"><button class="btn-ghost" onclick="go('diensten')">View All Services</button></div>
  </section>

  <section class="testimonials-section">
    <div class="testimonials-header">
      <div class="section-eyebrow" style="justify-content:center"><span>Client Testimonials</span></div>
      <h2 class="section-title" style="color:var(--ink);margin-top:.5rem">What Our Clients <em style="color:var(--gold-dark)">Say</em></h2>
    </div>
    <div class="testimonial-track-wrap">
      <div class="testimonial-track" id="testimonialTrack">
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"NOVA Residences did not simply find us a house — they found us a home. Every detail of the process was handled with exceptional care and an unwavering commitment to our wishes."</p><div class="testimonial-meta"><div class="testimonial-meta-name">M. van den Berg &amp; Family</div><div class="testimonial-meta-detail">Purchased — Herengracht 529, Amsterdam · 2024</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"As international buyers unfamiliar with the Dutch market, we were entirely dependent on expertise. Yannick was outstanding — patient, thorough, and extraordinarily well-connected. We completed within four months."</p><div class="testimonial-meta"><div class="testimonial-meta-name">Sir A. &amp; Lady Whitmore</div><div class="testimonial-meta-detail">Purchased — Blaricum Villa · 2024</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"Selling a property of this calibre requires an agency that truly understands discretion, positioning and the psychology of high-value buyers. NOVA achieved our asking price in under six weeks."</p><div class="testimonial-meta"><div class="testimonial-meta-name">F. de Beaumont</div><div class="testimonial-meta-detail">Sold — Rembrandtweg Estate, Noordwijk · 2024</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"Sophie guided us through every stage of the purchase with extraordinary knowledge. Her negotiation was surgical and she saved us a considerable sum against the original asking price. Truly exceptional service."</p><div class="testimonial-meta"><div class="testimonial-meta-name">Dr. C. &amp; H. Brinkman</div><div class="testimonial-meta-detail">Purchased — La Reine Residences, Amsterdam · 2023</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"We relocated from Singapore with two young children and no knowledge of the Netherlands. Lisa Vermeer found us the perfect home and coordinated schools, banking and our entire administrative set-up."</p><div class="testimonial-meta"><div class="testimonial-meta-name">R. &amp; T. Kwan-Morrison</div><div class="testimonial-meta-detail">Relocation — Wassenaar, Netherlands · 2024</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"Thijs and his team handled the sale of our Rumpt estate with consummate elegance. Their reach brought qualified buyers from three different countries, and the sale price exceeded our most optimistic projections."</p><div class="testimonial-meta"><div class="testimonial-meta-name">Count P. von Hohenberg</div><div class="testimonial-meta-detail">Sold — Domus Pacis, Rumpt · 2024</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"I have worked with real estate agencies across London, Geneva and New York. NOVA Residences stands apart — not merely in market knowledge but in the profound respect with which they treat both property and client."</p><div class="testimonial-meta"><div class="testimonial-meta-name">J.-P. Fontaine</div><div class="testimonial-meta-detail">International Portfolio — Amsterdam · 2023</div></div></div>
        <div class="testimonial-card"><div class="stars-row">★★★★★</div><p class="testimonial-text">"After a frustrating experience with another agency, we turned to NOVA. Within three weeks Yannick had sourced an off-market property matching our exact specification. The entire process was a revelation."</p><div class="testimonial-meta"><div class="testimonial-meta-name">Mr. &amp; Mrs. van der Hoeven</div><div class="testimonial-meta-detail">Purchased — Blaricum · 2024</div></div></div>
      </div>
    </div>
    <div class="tc-controls">
      <button class="tc-btn" id="tcPrev">&#8249;</button>
      <div class="tc-dots" id="tcDots"></div>
      <button class="tc-btn" id="tcNext">&#8250;</button>
    </div>
  </section>

  <section class="recent-section">
    <div class="reveal"><div class="section-eyebrow">Recent Listings</div><h2 class="section-title">Latest <em>Additions</em></h2></div>
    <div class="recent-grid" id="recentGrid"></div>
  </section>

  <div class="contact-section">
    <div class="contact-image"><img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&q=80" alt="Contact"><div class="contact-image-overlay"></div></div>
    <div class="contact-form-wrap">
      <div class="section-eyebrow">Contact Us</div>
      <h2 class="section-title">Let us<br><em>introduce ourselves</em></h2>
      <div class="divider"></div>
      <p style="font-size:.83rem;opacity:.58;line-height:1.9;margin-bottom:1.8rem">Tell us about your requirements. One of our advisors will be in touch within 24 hours for a confidential, no-obligation consultation.</p>
      <form onsubmit="formOK(event,this)">
        <div class="form-row"><div class="form-group"><label>First Name</label><input type="text" placeholder="James"></div><div class="form-group"><label>Last Name</label><input type="text" placeholder="Worthington"></div></div>
        <div class="form-group"><label>Email Address</label><input type="email" placeholder="james@example.com"></div>
        <div class="form-group"><label>Interest</label><select><option>Purchase</option><option>Sale</option><option>Valuation</option><option>Advisory</option></select></div>
        <div class="form-group"><label>Your Message</label><textarea placeholder="Tell us more about your requirements..."></textarea></div>
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  </div>

  <footer>
    <div class="footer-top">
      <div class="footer-brand">
        <div class="footer-logo">NOVA <em style="font-style:italic">Residences</em><span class="footer-sub">Exclusive Real Estate</span></div>
        <p>Defined by luxury. Driven by excellence. Your trusted partner in exceptional real estate across the Netherlands and beyond.</p>
      </div>
      <div class="footer-col"><h4>Properties</h4><ul>
        <li><a onclick="go('woningen')">All Properties</a></li>
        <li><a onclick="go('villas')">Villas &amp; Estates</a></li>
        <li><a onclick="go('penthouses')">Penthouses</a></li>
        <li><a onclick="go('appartementen')">Apartments</a></li>
        <li><a onclick="go('nieuwbouw')">New Development</a></li>
      </ul></div>
      <div class="footer-col"><h4>Services</h4><ul>
        <li><a onclick="go('diensten')">Buyer Representation</a></li>
        <li><a onclick="go('diensten')">Sales Agency</a></li>
        <li><a onclick="go('diensten')">Valuation</a></li>
        <li><a onclick="go('diensten')">Property Management</a></li>
        <li><a onclick="go('diensten')">Relocation</a></li>
      </ul></div>
      <div class="footer-col"><h4>Company</h4><ul>
        <li><a onclick="go('over')">About Us</a></li>
        <li><a onclick="go('team')">Our Team</a></li>
        <li><a onclick="go('contact')">Contact</a></li>
        <li><a onclick="go('privacy')">Privacy Policy</a></li>
        <li><a onclick="go('voorwaarden')">Terms &amp; Conditions</a></li>
      </ul></div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 NOVA Residences · All rights reserved · Chamber of Commerce 12345678</span>
      <div class="social-links"><a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a><a href="https://linkedin.com" target="_blank" rel="noopener">LinkedIn</a><a href="https://facebook.com" target="_blank" rel="noopener">Facebook</a></div>
    </div>
  </footer>
</div>

<!-- PROPERTY DETAIL -->
<div id="page-property" class="page">
  <div class="prop-hero">
    <img id="propHeroImg" class="prop-hero-img" src="" alt="">
    <div class="prop-hero-overlay"></div>
    <button class="prop-hero-back" onclick="goBack()">Back to overview</button>
    <button class="g-nav g-prev" onclick="propNav(-1)">&#8249;</button>
    <button class="g-nav g-next" onclick="propNav(1)">&#8250;</button>
    <div class="prop-counter" id="propCounter">1 / 1</div>
  </div>
  <div class="gallery-strip" id="galleryStrip"></div>
  <div class="prop-body">
    <div class="prop-main">
      <div class="prop-eyebrow" id="propType"></div>
      <h1 class="prop-title" id="propTitle"></h1>
      <div class="prop-address" id="propAddress"></div>
      <div class="prop-specs-row" id="propSpecs"></div>
      <p class="prop-description" id="propDesc"></p>
      <div class="prop-features" id="propFeatures"></div>
      <div class="prop-map-label">Location</div>
      <iframe class="prop-map" id="propMap" src="" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <button class="btn-primary" id="propLBBtn">View All Photos</button>
    </div>
    <div class="prop-sidebar">
      <div class="prop-price-card">
        <div class="prop-price-lbl">Asking Price</div>
        <div class="prop-price-big" id="propPrice"></div>
        <div class="prop-status">For Sale</div><br>
        <button class="prop-cta" onclick="go('contact')">Request a Viewing</button>
        <button class="prop-cta-ghost" onclick="go('contact')">Request Information</button>
        <div class="sothebys-badge" id="sothebysLink">Listed exclusively with Sotheby's International Realty</div>
      </div>
      <div class="agent-card">
        <div class="agent-header">
          <img class="agent-avatar" id="agentAvatar" src="" alt="">
          <div><div class="agent-name" id="agentName"></div><div class="agent-title-role" id="agentRole"></div></div>
        </div>
        <div class="agent-info" id="agentInfo"></div>
      </div>
    </div>
  </div>
</div>

<!-- LISTING PAGES -->
<div id="page-woningen" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">Our Portfolio</div><h1 class="section-title">All <em>Properties</em></h1><p style="font-size:.88rem;opacity:.58;margin-top:.9rem;max-width:500px;line-height:1.9">Exceptional residences listed exclusively through Sotheby's International Realty — across the Netherlands and beyond.</p></div><div class="subpage-grid" id="grid-woningen"></div></div>
<div id="page-villas" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">Category</div><h1 class="section-title">Villas &amp; <em>Estates</em></h1></div><div class="subpage-grid" id="grid-villas"></div></div>
<div id="page-penthouses" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">Category</div><h1 class="section-title">Penthouse <em>Residences</em></h1></div><div class="subpage-grid" id="grid-penthouses"></div></div>
<div id="page-nieuwbouw" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">Category</div><h1 class="section-title">New <em>Development</em></h1></div><div class="subpage-grid" id="grid-nieuwbouw"></div></div>
<div id="page-appartementen" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">Category</div><h1 class="section-title">Luxury <em>Apartments</em></h1></div><div class="subpage-grid" id="grid-appartementen"></div></div>
<div id="page-location" class="page subpage"><div class="subpage-hero"><div class="section-eyebrow">By Location</div><h1 class="section-title" id="locationPageTitle">Properties by <em>Location</em></h1></div><div class="subpage-grid" id="grid-location"></div></div>

<!-- SERVICES -->
<div id="page-diensten" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">What We Offer</div><h1 class="section-title">Our <em>Services</em></h1></div>
  <div class="diensten-grid">
    <div class="dienst-item"><div class="dienst-num">01</div><div class="dienst-title">Buyer Representation</div><p class="dienst-text">We proactively source properties that precisely match your requirements — including off-market opportunities available exclusively through our private network. Our advisors negotiate on your behalf with expertise and a decisive strategy, protecting your interests at every turn.</p></div>
    <div class="dienst-item"><div class="dienst-num">02</div><div class="dienst-title">Sales Agency</div><p class="dienst-text">From professional staging, photography and aerial cinematography to targeted marketing among a qualified pool of buyers. We position your property to achieve maximum value and a swift, seamless transaction with complete discretion.</p></div>
    <div class="dienst-item"><div class="dienst-num">03</div><div class="dienst-title">Valuation &amp; Advisory</div><p class="dienst-text">Precise valuations grounded in real-time market data, comparative analysis and location intelligence. Our certified valuations are accepted for mortgage, tax, inheritance and commercial purposes across all European jurisdictions.</p></div>
    <div class="dienst-item"><div class="dienst-num">04</div><div class="dienst-title">Property Management</div><p class="dienst-text">Comprehensive management of your real estate portfolio — lettings, maintenance, renovation and regulatory compliance. You enjoy the returns; we carry the responsibility with the same care as if the property were our own.</p></div>
    <div class="dienst-item"><div class="dienst-num">05</div><div class="dienst-title">International Network</div><p class="dienst-text">Through our partnership with Sotheby's International Realty — the world's largest luxury real estate network — we connect buyers and sellers across more than 80 countries and 1,000 offices worldwide.</p></div>
    <div class="dienst-item"><div class="dienst-num">06</div><div class="dienst-title">Relocation Services</div><p class="dienst-text">We guide executives and expat families through every aspect of relocation: property search, school selection, banking, registration and integration — ensuring a smooth and confident start in a new country.</p></div>
  </div>
  <div style="text-align:center;padding:0 4rem 4.5rem"><button class="btn-primary" onclick="go('contact')">Contact Us</button></div>
</div>

<!-- ABOUT -->
<div id="page-over" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">Our Story</div><h1 class="section-title">About <em>NOVA Residences</em></h1></div>
  <div class="over-split">
    <div class="over-img"><img src="https://images.unsplash.com/photo-1600047509358-9dc75507daeb?w=1200&q=90" alt="About NOVA"></div>
    <div class="over-text">
      <div class="section-eyebrow">Who We Are</div>
      <h2 class="section-title" style="font-size:1.9rem">More than property<br>— <em>legacy</em></h2>
      <div class="divider"></div>
      <p class="lead">We believe that an exceptional home is more than stone and glass — it is the very embodiment of a way of life.</p>
      <p>NOVA Residences was founded in 2008 with a single mission: to connect outstanding properties with the most discerning of clients. Over eighteen years we have grown into one of the most respected names in luxury real estate, operating in proud partnership with Sotheby's International Realty.</p>
      <p>Our approach rests on three pillars: expertise, network, and discretion. We know every market, every property, and every client personally. No automation, no mass market — exclusively personal, expert counsel at every stage.</p>
      <button class="btn-ghost" onclick="go('team')" style="margin-top:.5rem">Meet Our Team</button>
    </div>
  </div>
  <div style="padding:3.5rem 4rem 2rem"><div class="section-eyebrow">Our People</div><h2 class="section-title">The team <em>behind NOVA</em></h2></div>
  <div class="team-grid" style="margin:0 0 4.5rem">
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&q=80" alt=""><div class="team-name">Thijs Spoorendonk</div><div class="team-role">Deputy Director</div></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80" alt=""><div class="team-name">Yannick Leenders</div><div class="team-role">Senior Property Advisor</div></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=200&q=80" alt=""><div class="team-name">Sophie de Graaf</div><div class="team-role">Senior Advisor</div></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&q=80" alt=""><div class="team-name">Lisa Vermeer</div><div class="team-role">International Desk</div></div>
  </div>
</div>

<!-- TEAM -->
<div id="page-team" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">Who We Are</div><h1 class="section-title">Our <em>Team</em></h1></div>
  <div class="team-grid" style="margin:3rem 4rem 4.5rem">
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=200&q=80" alt=""><div class="team-name">Thijs Spoorendonk</div><div class="team-role">Deputy Director</div><p class="team-bio">18 years in luxury real estate. Specialist in Amsterdam and international portfolios.</p></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80" alt=""><div class="team-name">Yannick Leenders</div><div class="team-role">Senior Property Advisor</div><p class="team-bio">Expert in Amsterdam canal houses, the Gooi region, and off-market acquisition strategies.</p></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=200&q=80" alt=""><div class="team-name">Sophie de Graaf</div><div class="team-role">Senior Advisor</div><p class="team-bio">Certified valuator with a specialisation in listed heritage properties and new development.</p></div>
    <div class="team-card"><img class="team-avatar" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&q=80" alt=""><div class="team-name">Lisa Vermeer</div><div class="team-role">International Desk</div><p class="team-bio">Fluent in five languages. Key point of contact for international buyers and expat families.</p></div>
  </div>
</div>

<!-- CONTACT -->
<div id="page-contact" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">Get in Touch</div><h1 class="section-title">Contact <em>Us</em></h1></div>
  <div class="contact-full">
    <div>
      <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:1.8rem">We are at your service</h3>
      <div class="contact-info-item"><div class="contact-info-label">Office Address</div><div class="contact-info-val">Herengracht 182<br>1016 BS Amsterdam, Netherlands</div></div>
      <div class="contact-info-item"><div class="contact-info-label">Telephone</div><div class="contact-info-val">+31 (0)20 123 4567</div></div>
      <div class="contact-info-item"><div class="contact-info-label">Email</div><div class="contact-info-val">info@nova-residences.com</div></div>
      <div class="contact-info-item"><div class="contact-info-label">Opening Hours</div><div class="contact-info-val">Monday – Friday: 9:00 – 18:00<br>Saturday: 10:00 – 15:00 (by appointment)</div></div>
    </div>
    <div>
      <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:1.8rem">Send us a message</h3>
      <form onsubmit="formOK(event,this)">
        <div class="form-row"><div class="form-group"><label>First Name</label><input type="text" placeholder="James"></div><div class="form-group"><label>Last Name</label><input type="text" placeholder="Worthington"></div></div>
        <div class="form-group"><label>Email</label><input type="email" placeholder="james@example.com"></div>
        <div class="form-group"><label>Telephone</label><input type="tel" placeholder="+31 6 00 00 00 00"></div>
        <div class="form-group"><label>Subject</label><select><option>Purchase</option><option>Sale</option><option>Valuation</option><option>Advisory</option><option>Other</option></select></div>
        <div class="form-group"><label>Your Message</label><textarea placeholder="Tell us more..." style="height:115px"></textarea></div>
        <button type="submit" class="submit-btn">Send Message</button>
      </form>
    </div>
  </div>
</div>

<!-- PRIVACY -->
<div id="page-privacy" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">Legal</div><h1 class="section-title"><em>Privacy Policy</em></h1></div>
  <div class="legal-body">
    <p class="legal-p">NOVA Residences B.V. is committed to protecting the privacy and personal data of its clients, visitors and partners in accordance with the GDPR.</p>
    <h3 class="legal-section-title">What data do we collect?</h3>
    <p class="legal-p">We collect name and contact details, property requirements, correspondence, and technical data generated through use of our website.</p>
    <h3 class="legal-section-title">Retention period</h3>
    <p class="legal-p">We retain your data only for as long as necessary. Client files are retained for a maximum of seven years in accordance with statutory obligations.</p>
    <h3 class="legal-section-title">Your rights</h3>
    <p class="legal-p">You have the right to access, correct and erase your personal data. Contact us at info@nova-residences.com or Herengracht 182, 1016 BS Amsterdam.</p>
  </div>
</div>

<!-- TERMS -->
<div id="page-voorwaarden" class="page subpage">
  <div class="subpage-hero"><div class="section-eyebrow">Legal</div><h1 class="section-title">Terms &amp; <em>Conditions</em></h1></div>
  <div class="legal-body">
    <h3 class="legal-section-title">Article 1 – Applicability</h3>
    <p class="legal-p">These general terms and conditions apply to all instructions given to NOVA Residences B.V., as well as to all offers and agreements concluded with or through NOVA Residences.</p>
    <h3 class="legal-section-title">Article 2 – Agency Agreement</h3>
    <p class="legal-p">NOVA Residences acts as an independent agent and intermediary, not as a contracting party to the purchase agreement concluded between buyer and seller.</p>
    <h3 class="legal-section-title">Article 3 – Commission</h3>
    <p class="legal-p">Commission amounts to the agreed percentage of the purchase price, unless otherwise agreed in writing. Commission becomes due upon conclusion of a purchase agreement.</p>
    <h3 class="legal-section-title">Article 4 – Liability</h3>
    <p class="legal-p">The liability of NOVA Residences is limited to the amount covered by the professional indemnity insurance held by the company.</p>
  </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox" onclick="lbBgClose(event)">
  <button class="lb-close" onclick="closeLB()">✕</button>
  <button class="lb-nav lb-prev" onclick="lbNav(-1)">&#8249;</button>
  <button class="lb-nav lb-next" onclick="lbNav(1)">&#8250;</button>
  <div class="lightbox-img-wrap"><img class="lightbox-img" id="lbImg" src="" alt=""></div>
  <div class="lb-caption" id="lbCaption"></div>
  <div class="lb-strip" id="lbStrip"></div>
</div>

<script>
/* ═══════════════════════════════════════════════════════
   NOVA Residences — Property Data
   ▸ Prins Hendriklaan 9D (Blaricum) — REMOVED
   ▸ Koepoortstraat 6 (Middelburg)   — REMOVED
   ▸ New International Listings Added (Sotheby's style):
     London · New York · Miami · Paris · Portugal · Spain
═══════════════════════════════════════════════════════ */

/* Helper: Anywhere Real Estate CDN (SIR UUID images) */
const air = id => `https://openapi.images.anywhere.re/${id}`;

/* Helper: Unsplash image URL */
const unsp = (id, w=1400) => `https://images.unsplash.com/photo-${id}?w=${w}&q=90`;

const agents = [
  {
    name:'Thijs Spoorendonk',
    role:'Deputy Director',
    avatar: unsp('1560250097-0b93528c311a', 200),
    info:'📞 +31 (0)20 123 4567\n✉️ t.spoorendonk@nova-residences.com\n🕐 Mon–Fri  9:00 – 18:00'
  },
  {
    name:'Yannick Leenders',
    role:'Senior Property Advisor',
    avatar: unsp('1507003211169-0a1dd7228f2d', 200),
    info:'📞 +31 (0)20 123 4568\n✉️ y.leenders@nova-residences.com\n🕐 Mon–Fri  9:00 – 18:00'
  },
  {
    name:'Sophie de Graaf',
    role:'Senior Advisor',
    avatar: unsp('1573497019940-1c28c88b4f3e', 200),
    info:'📞 +31 (0)20 123 4569\n✉️ s.degraaf@nova-residences.com\n🕐 Mon–Fri  9:00 – 18:00'
  },
  {
    name:'Lisa Vermeer',
    role:'International Desk',
    avatar: unsp('1580489944761-15a19d654956', 200),
    info:'📞 +31 (0)20 123 4570\n✉️ l.vermeer@nova-residences.com\n🕐 Mon–Fri  9:00 – 18:00'
  }
];

const props = [

  /* ─── 0: Herengracht 529, Amsterdam ─── */
  {
    id:0, agent:1, badge:'National Monument',
    sirUrl:'https://www.sothebysrealty.com/id/3ep2kc',
    type:'Canal House · For Sale',
    name:'Herengracht 529',
    address:'Golden Bend, Amsterdam, Netherlands',
    price:'€ 10,295,000',
    area:614, beds:4, baths:7, garage:0,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436!2d4.8924!3d52.3613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609b8b79de2db%3A0x7ae4b5a5b2a7b20a!2sHerengracht%20529%2C%201017%20BV%20Amsterdam!5e0!3m2!1snl!2snl!4v1700000000004',
    desc:'On Amsterdam\'s prestigious Herengracht, in the renowned Golden Bend, stands this remarkable national monument: a stately canal house measuring 614 m² across six floors. A residence that blends centuries of history with contemporary luxury. The entrance immediately impresses with soaring ceilings, marble floors, and a grand staircase. The piano nobile features a formal living room with high windows overlooking the Herengracht. A true rarity in Amsterdam: a beautifully landscaped garden with terrace and private swimming pond.',
    features:['614 m² across six floors','National Listed Monument','Private swimming pond & garden','Piano nobile with canal views','Master suite with spa bathroom','High-end kitchen with island','Underfloor heating on ground floor','Golden Bend — steps from Rijksmuseum'],
    imgs:['100F724F-E08E-4B08-BF6D-15307D30418A','99B073A3-8B1A-4CEC-ABAF-5DB89D697D8A','9D2D26B7-93E1-46AC-872C-16A412097A2C','D6447072-B15D-406A-B88E-59D7EA889E35','8B9D3DE5-54EF-48CE-B4FC-31CA3C0ED7F0','5AD53DBF-EAE3-40F4-972E-A9BEF67DD6EF','799E5332-4283-4CF1-96AC-B47F137619E2','6E692CCD-C3A4-4A76-AD41-B754E90C6049','A5475BBB-F100-4861-8013-34D4BDC55C10','68521268-798A-47D3-9168-57324D90FFE3','863AA5EA-4535-4E78-A48B-4492AF1B5B47','3135B39C-6888-4F36-A16A-1745556BD344','CD54346F-DBEC-4241-A78A-9923D4A51FDC','FC6D8874-B2A9-4129-80F8-36A6B6CC2C14','A1CD947E-FAE3-4627-844C-883296C22616','2003EF88-9DAE-4A13-BDE0-FB1732943344','96920619-61FA-430C-B8B4-5A78658F427B','5C2996E2-A508-4C92-9D18-2F6817F662B2','35F5835D-F04E-492F-BB4F-1A044ADF1549','1A94C99D-3A90-46C5-8CED-D1390BE5D7A5'].map(air)
  },

  /* ─── 1: Rembrandtweg 30, Noordwijk ─── */
  {
    id:1, agent:0, badge:'Private Estate',
    sirUrl:'https://www.sothebysrealty.com/id/64c92m',
    type:'Villa · For Sale',
    name:'Rembrandtweg 30',
    address:'Zuidduinen, Noordwijk aan Zee, Netherlands',
    price:'Price Upon Request',
    area:714, beds:7, baths:6, garage:4,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2456!2d4.4410!3d52.2580!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5d8a2b2f3c3a5%3A0x3a2b1c0d9e8f7e6d!2sRembrandtweg%2030%2C%202202%20AZ%20Noordwijk!5e0!3m2!1snl!2snl!4v1700000000001',
    desc:'On a prime position in the Noordwijkse Zuidduinen, this extraordinary private estate consists of two ultra-modern, newly built detached villas — connected underground. Designed by renowned architect Van Manen with interiors by Kameling & VanderBurgh. The estate exudes a unique "Ibiza vibe": light, warmth, and the permanent feeling of being on holiday — year-round. Seven bedrooms, 6 bathrooms, a heated 12×4m pool, separate outdoor jacuzzi, sauna, and a pool house. Two large rooftop terraces offer views to the sea. The beach is just 400 metres away.',
    features:['Two connected villas (3 addresses)','714 m² living area, 1,872 m² plot','400m walk to the beach','Heated pool (12×4m) + outdoor jacuzzi','Sauna, steam bath & wellness suite','Fingerprint-secured private entrance','Rooftop terrace with sea views','Security cameras & 24h surveillance'],
    imgs:['73FDC044-FB6F-4D83-89FE-50F75162A7EA','6C8B647F-632A-4932-A687-685725A0CDCE','35FC5402-69F8-49B4-8FE2-1DC6EB6BE24F','A700E53A-9BE0-4E5C-93F0-B0E80C8375A8','834BF033-73C5-44F7-AFE2-ADB709FCB3D5','4B329D49-341E-4EBF-B022-00EC19452E35','67385645-AA9F-498F-A6A4-3881B4E6DE82','4C97F672-78B3-4161-9240-554B127CC80C','E9C10CDB-26A1-4168-BA07-330C3B865FBA','F29C2A7D-BF46-4D12-B616-5DCCACA7FFE5','B814AD3B-94F7-4821-A566-C84B4E8D86A6','0FDDABA0-E934-41B1-BB9B-F137F25D6373','F64BB2EB-006B-4A8B-8E54-03C7F728D206','8BF75F7E-4596-47C3-8508-C9A839272243','18EC9670-2756-4001-8466-DEE67F0B9B8F','88749506-6FEC-49E2-9A8D-6D7BD4156101','210FF8BF-267F-4D75-8801-1B0BB843A38D','8C6E794E-AEDA-4FF1-BC8D-6E45F69E3917','9D0C9AA2-08A6-4F14-B1D6-55E27CB3D8DA','4381382D-AFB3-4F2B-8C60-4235B7DB767D'].map(air)
  },

  /* ─── 2: Bussummerweg 14, Blaricum ─── */
  {
    id:2, agent:2, badge:'New Build 2023',
    sirUrl:'https://www.sothebysrealty.com/id/5gcmms',
    type:'Villa · For Sale',
    name:'Bussummerweg 14',
    address:"Blaricum, 't Gooi, Netherlands",
    price:'€ 7,850,000',
    area:525, beds:5, baths:5, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2444!2d5.2510!3d52.2730!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c62d5b7c3a1b2f%3A0x1a2b3c4d5e6f7a8b!2sBussummerweg%2014%2C%201261%20CA%20Blaricum!5e0!3m2!1snl!2snl!4v1700000000002',
    desc:"Rarely does the opportunity arise in 't Gooi to acquire a recently built Vlassak-Verhulst villa of this calibre. Situated on a prime location within walking distance of Blaricum village centre, this detached villa effortlessly unites classical grandeur with contemporary perfection. The villa features an exclusive swimming pool with a moveable floor, a pool house with covered terrace and open fireplace, a fully equipped outdoor kitchen, and au pair accommodation above the double garage. Energy label A+, built 2023.",
    features:['525 m² living area, 2,100 m² plot','Vlassak-Verhulst villa (2023)','Pool with moveable floor','Pool house with outdoor kitchen','Energy label A+','Double garage + additional storage','Au pair / studio above garage','Walking distance to Blaricum village'],
    imgs:['08652B58-98F3-4F18-A82E-DB2D565F50F6','1B95C1D9-C32F-47E9-BC26-85AD8011F82E','6E3574D5-3FF4-4E68-9A99-4AD4C0C073C7','DF722F72-0EB1-4EB5-91F1-674B0AE49E34','5AEF3AA5-5552-4A83-A9C0-57E2BA637C81','026CCF7A-CE1D-4361-B22F-EC2135281715','7A739BBF-DA96-4A6F-ADBA-8634A2A616D7','3AEE97D3-B697-41A6-A3F4-B43702A60181','A5F35DBE-CB85-4351-A3A9-BE8FF43A0A85','917D70EE-E75C-4EFB-B2F4-2CE7322BC5FD','3DF8B9CE-E6E2-4264-AC51-89FA07F6A41D','587A48A2-2A06-40DD-B201-D12D33869A99','F34AEA9A-A804-49AF-A318-B4776F340E63','D56C66DA-BD33-44F5-ABAF-2C3DEBBA9F78','940FC609-2D0B-4270-B86F-C109A9CE0215','2B37E142-A3E2-4C21-8BE5-8EB553D9B5D9','4018B651-1170-4125-B30D-04C2038B27D4','AC9A707C-F08E-49B4-9006-155389B1BE17','52F0F133-9D24-4F18-B0E4-7A5870A43BDA','A4CC69F2-14CC-429E-BA6B-C975D7EA4FB0'].map(air)
  },

  /* ─── 3: Domus Pacis — Raadsteeg 8, Rumpt ─── */
  {
    id:3, agent:2, badge:'19th-Century Mansion',
    sirUrl:'https://www.sothebysrealty.com/id/5f3cw7',
    type:'Country Estate · For Sale',
    name:'Domus Pacis — Raadsteeg 8',
    address:'Rumpt, Gelderland, Netherlands',
    price:'€ 6,700,000',
    area:813, beds:6, baths:5, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463!2d5.1710!3d51.8680!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6d3b2a1c0e9f7%3A0x8a9b0c1d2e3f4a5b!2sRaadsteeg%208%2C%204156%20AN%20Rumpt!5e0!3m2!1snl!2snl!4v1700000000003',
    desc:'"Domus Pacis" — the name means House of Peace, Calm and Security — truly befits this stately 19th-century mansion. Built in 1883 and comprehensively modernised in 2019 under architect Friso Woudstra. The estate sits on the banks of the River Linge with landscaped grounds including a gazebo, pond, and terraces. A pool with wellness suite, a self-contained guest apartment, and a meadow of approximately 7,500 m² — ideal for horses.',
    features:['813 m² living area, 9,095 m² plot','Built 1883, renovated 2019','Pool & full wellness suite','Self-contained guest apartment','7,500 m² meadow (deer/horses)','6,000 m² wooded riverside plot','55 min. drive to Amsterdam','Architect Friso Woudstra'],
    imgs:['9D72B6D8-E57A-49A2-A5F7-188051C63520','22F06CDD-8E8A-4B27-AB5A-E358AE4B1AA7','39CD6753-1871-4304-82EC-CCED4E90087D','1EFA2DDF-2FA1-4467-B180-F3DA024EB84F','E0AFC4F6-F087-4108-8677-64F516EE0D60','AE549235-20F1-422F-A43D-833C02C83964','7260E314-23DD-4D1C-8DF1-14EDB57D8C84','4A3E955B-9EA2-45B2-AB81-4BC6BADAE2D9','050ADCB5-255A-484A-AE6A-2431C3CBD397','105EE6BE-A446-47A7-8A3F-5162859746A8','23090D52-2B45-4D3A-86B3-695F4F612DEE','539FA817-47A9-4F49-874D-DC1E82769973','8CDA3530-31F3-4567-A473-5514624DA22E','7066DA4F-1058-4964-A475-DFC090002678','E0A9D3EE-8BFD-4F4D-9292-EDFAFCE7C32A','BF94C0E6-811C-4D1B-834E-AD64CF47A933','7CEF435A-D094-43F0-ACF8-41FEB4A01ADF','B0D70947-31EF-4F52-AB2B-533A0F7CB713','0C6891EC-2AAA-4044-91E3-742077F45708','32DDFBFC-F252-4C73-9DC6-2A678B5B09FF'].map(air)
  },

  /* ─── 4: La Reine Residences – The Grand Suite, Amsterdam ─── */
  {
    id:4, agent:0, badge:'Penthouse',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-70720-7yw2j8/amsterdam-museumkwartier',
    type:'Penthouse · For Sale',
    name:'La Reine Residences – The Grand Suite',
    address:'Museumkwartier, Amsterdam, Netherlands',
    price:'€ 1,900,000',
    area:165, beds:2, baths:2, garage:1,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436!2d4.8757!3d52.3568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609d75c4c1b1f%3A0x2c3d4e5f6a7b8c9d!2sMuseumkwartier%2C%201071%20HZ%20Amsterdam!5e0!3m2!1snl!2snl!4v1700000000000',
    desc:"A remarkable apartment of approximately 165 m² located in Amsterdam's prestigious Museumkwartier — directly opposite the Stedelijk Museum and a three-minute walk from the Rijksmuseum, Van Gogh Museum and the P.C. Hooftstraat. La Reine Residences is a boutique residential building offering concierge service and valet parking. The Grand Suite features a generous reception room, a bespoke kitchen, two bedrooms each with ensuite bathroom, and a private terrace.",
    features:['165 m² — Museumkwartier location','Concierge & valet parking service','3 min. walk to Rijksmuseum','Private terrace','Two bedrooms, two ensuite bathrooms','P.C. Hooftstraat within walking distance','Underground parking included','Secured residential building'],
    imgs:[
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1600210492493-0946911123ea'),
      unsp('1484154218962-a197022b5858'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1493809842364-78817add7ffb'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1600121848594-d8644e57abab'),
      unsp('1556912173-3bb406ef7e77'),
      unsp('1600585154526-990dced4db0d')
    ]
  },

  /* ─── 5: Via San Felice a Ema, Florence ─── */
  {
    id:5, agent:2, badge:'Historic Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-2945-dvsp3g/via-san-felice-a-ema-firenze-fi-50125',
    type:'Villa · For Sale',
    name:'Via San Felice a Ema',
    address:'Florence, Tuscany, Italy',
    price:'€ 29,000,000',
    area:2800, beds:16, baths:10, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5500!2d11.2550!3d43.7470!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a56aa7e66a979%3A0x57a8ef0e6be3f70f!2sVia%20di%20San%20Felice%20a%20Ema%2C%20Firenze!5e0!3m2!1sit!2sit!4v1700000000010',
    desc:'A prestigious historic residence in a magnificent private park just outside Florence. Spanning 2,800 m² across 16 rooms within 7 hectares of beautifully landscaped grounds. The property retains all original historic architectural features — vaulted ceilings, period frescoes, terracotta floors — combined with comprehensive modern amenities. The park includes specimen trees, formal Italian gardens, a swimming pool terrace, and a private approach road.',
    features:["2,800 m² · 7 hectares of park",'16 rooms · Grand historic villa','Period frescoes & vaulted ceilings','Formal Italian gardens · Swimming pool','Private approach road & gated entry','Minutes from Florence historic centre',"Sotheby's International Realty Italy",'Florence SIR listing'],
    imgs:['20231019141707-128','20231019143422-113','20231019143234-67','20231019143436-119','20231019143448-124','20231019143417-111','20231019143248-73','20231019143228-65','20231019143231-66','20231019143258-78','20231019143237-68','20231019143354-102','20231019143243-71','20231019143245-72','20231019143345-98','20231019143351-101','20231019143256-77','20231019143301-79','20231019143239-69','20231019143307-82'].map(f=>`https://txc5xc6e.cdn.imgeng.in/custom/01505/foto/${f}.jpg`)
  },

  /* ─── 6: Viale della Repubblica, Massa Marittima (Tuscany) ─── */
  {
    id:6, agent:2, badge:'Wine Estate',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-84328-yrjtep/viale-della-repubblica-massa-marittima-gr-58024',
    type:'Estate · For Sale',
    name:'Viale della Repubblica',
    address:'Massa Marittima, Grosseto, Tuscany, Italy',
    price:'€ 28,000,000',
    area:2700, beds:17, baths:12, garage:4,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10000!2d10.8900!3d43.0490!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132b16f8dc945f3d%3A0x5e0e4c6a7e8f9b2c!2sMassa%20Marittima%2C%20GR!5e0!3m2!1sit!2sit!4v1700000000011',
    desc:'A splendid estate completely renovated and surrounded by vineyards and olive groves in the heart of Maremma Tuscany. Five main buildings plus auxiliary structures set within 34 hectares. The main villa spans three levels featuring grand salons with fireplaces, a cinema room, and five en-suite bedrooms. Outdoor facilities include a tennis court, golf course, paddock, an artificial lake, a pool with solarium and a wellness centre.',
    features:['2,700 m² · 34 hectares','5 buildings + auxiliary structures','Pool · Solarium · Spa · Wellness centre','Tennis court · Golf course · Paddock','Artificial lake & formal grounds','DOC Maremma wine production','Cinema room · Grand reception salons',"Sotheby's International Realty Italy"],
    imgs:['20231019143307-82','20231019143301-79','20231019143256-77','20231019143351-101','20231019143345-98','20231019143245-72','20231019143243-71','20231019143354-102','20231019143237-68','20231019143258-78','20231019143231-66','20231019143228-65','20231019143248-73','20231019143417-111','20231019143448-124','20231019143436-119','20231019143234-67','20231019143422-113','20231019141707-128','20231019143239-69'].map(f=>`https://txc5xc6e.cdn.imgeng.in/custom/01505/foto/${f}.jpg`)
  },

  /* ─── 7: Via del Gufo, Montespertoli (Chianti) ─── */
  {
    id:7, agent:0, badge:'Chianti Estate',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-2945-2tfes5/via-del-gufo-montespertoli-fi-50025',
    type:'Country Estate · For Sale',
    name:'Via del Gufo',
    address:'Montespertoli, Florence, Chianti, Italy',
    price:'€ 20,000,000',
    area:8000, beds:17, baths:17, garage:4,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15000!2d11.0730!3d43.5540!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a6ae15f0f8bab%3A0x9a6e1f72e8c4d5c8!2sMontespertoli%2C%20FI!5e0!3m2!1sit!2sit!4v1700000000012',
    desc:'An exceptional 300-hectare hunting and agricultural estate in the Florentine Chianti. A 17th-century village with renovated farmhouses totalling approximately 7,800 m². Three swimming pools and a tennis court complete the leisure facilities. The estate\'s 60 hectares of DOCG vineyards produce up to 450,000 bottles per year; 40 ha olive groves and 90 ha of managed forest complete the agricultural holding.',
    features:['8,000 m² buildings · 300 hectares','60 ha DOCG vineyards (450,000 btl/yr)','3 swimming pools · Tennis court','Panoramic tower terrace','17th-century village + farmhouses','400 ha consortium hunting reserve','40 ha olive groves · 90 ha forest',"Sotheby's International Realty Italy"],
    imgs:['3DF33BB2-FF74-49AC-8B5D-9EEBFAA37306','C21CFE69-5704-4E28-A273-3E17235BC3FD','19945A0D-AB20-499F-B1D2-0D43F4818FFA','9026B2A5-64BE-4260-A467-FB32D7AEADF5','8E6F7E26-0B59-4E4C-80FF-91B5494B39E0','CF5AC413-779D-4C65-8D3B-07AB61745E66','8265117B-7CE0-4245-B6C0-4B7D50B5E896','67F163E6-56EF-4E26-9D47-8E422C372FEC','1932E4A2-0C1A-46E4-B71C-67C235D3D3AF','A8BB93B9-489D-4CA2-96EA-83FCFC43458C','F74EB614-4EBB-4687-BAD9-64C2632E1C55','AD442870-CF08-47A5-BC63-3A0182C80ED7','ED5ED9CF-5128-40DC-A5BE-3CDEC6A25C75','6D6C9816-9D21-4984-9D38-A50CB4AD18F7','4F51ECDD-4105-49E4-A30A-0227C1230C20','2C53B031-B5BC-4D89-8E8E-C11863F5E6A2','F8B0BFF8-5990-44DE-806D-3030D945BD70','CA55CBAD-0D9F-40A0-8AD9-A31812B0F09B','3BADA14E-EC13-423D-A46B-73E627EF478B','8657DCD5-AF0F-47DC-BB65-D6A21AD8EE7C'].map(air)
  },

  /* ─── 8: Villa Antinori di Monte Aguglioni, Scandicci ─── */
  {
    id:8, agent:1, badge:'Renaissance Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-2945-t2cxrq/via-della-prata-scandicci-fi-50018',
    type:'Historic Villa · For Sale',
    name:'Villa Antinori di Monte Aguglioni',
    address:'Scandicci, Florence, Tuscany, Italy',
    price:'€ 18,000,000',
    area:2800, beds:14, baths:15, garage:3,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5000!2d11.1920!3d43.7450!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a567e7a2f3c1d%3A0x4b8e5f6a7c9d0e1f!2sScandicci%2C%20FI!5e0!3m2!1sit!2sit!4v1700000000013',
    desc:'A few kilometres from Florence stands this extraordinary 16th-century complex formerly owned by Francesco del Giocondo, husband of the Mona Lisa, and subsequently by the noble Antinori family. Set within a 27-hectare park with a private chapel, swimming pool and tennis court. The formal Italian garden was designed by celebrated architect Cecil Pinsent.',
    features:['2,800 m² · 27 hectares','Former Mona Lisa connection (del Giocondo)','Cecil Pinsent designed gardens','Private chapel (17th century)','Swimming pool · Tennis court','Lift connecting all floors','Cypress allée · Formal Italian garden',"Sotheby's International Realty Italy"],
    imgs:['C5C6AF53-6B35-4D5D-8FD9-3389CB975BB8','20933638-A409-4858-AF4F-AFC27A61CFC5','35EF3339-7E24-45E6-BEF6-3BB8210241B9','768AB018-C89E-4421-8F32-D53CF16F0E91','B732D627-D072-4EE5-AE52-05C81E98DE66','ED6D42E2-F712-4ED1-BB57-6B5E9AB4B8F1','46052A22-66AE-4D8F-A022-E6FC25B9CB5A','2264D239-34EF-4A00-B166-7A67B860802E','52557413-A38D-4007-AAF7-E5BD4787AB04','E4FB95CB-F38B-4646-BAEC-0075C540E1A1','384A14E4-9AB8-415B-8C2D-E766A212D018','90B7B4ED-3E9A-4AEF-BC4F-BE2B3E026D09','81C533C3-B3E2-4770-A5A9-7224FB9DE3CF','404322A8-BF20-454E-98F6-FF8464A547DD','A2F72803-C028-4516-9BA3-D30CD2F9086F','2C1E864C-1068-4C25-99E9-3F5CF3B7A944','80446F1B-0FC4-4E88-8E92-AD8FED769967','3513C7D9-0778-4B3F-8C42-9DFFB93406FB','474365BA-719B-4B9D-9CD2-F34524275D72','FC0C175B-654B-4965-9466-B3B3E7755058'].map(air)
  },

  /* ─── 9: Via delle Selvette, Capannori (Lucca) ─── */
  {
    id:9, agent:2, badge:'18th-Century Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-84328-sbnsej/via-delle-selvette-capannori-lu-55018',
    type:'Historic Villa · For Sale',
    name:'Via delle Selvette',
    address:'Capannori, Lucca, Tuscany, Italy',
    price:'€ 15,000,000',
    area:3200, beds:15, baths:10, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10000!2d10.6030!3d43.8450!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d5916ef3c9febb%3A0x7a8b9c0d1e2f3a4b!2sCapannori%2C%20LU!5e0!3m2!1sit!2sit!4v1700000000014',
    desc:'A majestic 18th-century villa in the hills of Capannori near Lucca — once owned by Carolina Bonaparte. The 3,200 m² villa retains original period architecture including grand reception rooms, frescoed ceilings, and a private chapel, set within maintained landscape of terraced gardens and woodland walks with panoramic views across the Lucchese countryside.',
    features:['3,200 m² · Historic parkland','18th century · Former Bonaparte residence','Grand reception rooms with frescoes','Private chapel · Formal gardens','Terraced hillside grounds','Views of Lucchese countryside','Near Lucca historic walls',"Sotheby's International Realty Italy"],
    imgs:['20231019143228-65','20231019143231-66','20231019143234-67','20231019143237-68','20231019143239-69','20231019143243-71','20231019143245-72','20231019143248-73','20231019143256-77','20231019143258-78','20231019143301-79','20231019143307-82','20231019143345-98','20231019143351-101','20231019143354-102','20231019143417-111','20231019143422-113','20231019143436-119','20231019143448-124','20231019141707-128'].map(f=>`https://txc5xc6e.cdn.imgeng.in/custom/01505/foto/${f}.jpg`)
  },

  /* ─── 10: La Cadière-d'Azur Sea View, Provence ─── */
  {
    id:10, agent:0, badge:'Contemporary Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-2814173-wyfl6n/la-cadiere-d-azur-sea-view-estate-on-7-000-sqm-of-land-la-cadiere-d-azur-pr-83740',
    type:'Villa · For Sale',
    name:"La Cadière-d'Azur — Sea View",
    address:"La Cadière-d'Azur, Var, Provence, France",
    price:'€ 3,450,000',
    area:320, beds:7, baths:7, garage:4,
    mapSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10000!2d5.7430!3d43.1810!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9b7c3d2a1e4f5%3A0x6b7c8d9e0f1a2b3c!2sLa%20Cadiere-d-Azur%2C%20Var!5e0!3m2!1sfr!2sfr!4v1700000000015",
    desc:"A contemporary villa built in 2021 with exceptional sea views over the Mediterranean, set within 7,000 m² of private grounds in Provence. The 320 m² residence features a 15.5×5m infinity pool, mini golf, gym, and an ancient olive grove. The garden level provides a completely independent apartment with three bedrooms.",
    features:['320 m² built · 7,000 m² grounds','Built 2021 · Contemporary design','Infinity pool 15.5×5m','Mini golf · Gym','Independent 3-bed garden apartment','Ancient olive grove','Canal de Provence water supply',"Marseille Sotheby's International Realty"],
    imgs:['37DC75DB-C2FD-4426-BB2E-5DBCB18454E3','4F5F244D-1631-4498-AB53-E2BB9A948E38','47F1DE2D-9B0F-4103-A18C-471AC75B005B','13C03D02-6577-4CC1-A571-AC4BFA22C0A7','30BE3F19-9827-459E-B347-C9A6AD06C57D','551F5F10-ABC3-4DC9-AC41-F17A024F2D4C','FE1AB142-8F87-4396-9C12-20C95BA0E817','05B4CC3B-7750-4100-90AD-474B450F6E66','A29535AE-9813-447A-B58D-403B52705DB9','F0CD5DD2-ACE8-4C69-A511-B3A71FAA5753','FC61139D-1078-4883-9BB7-DF40829ACF2E','A879F364-AA48-4518-B0C2-70D9953C87E7','42460EC0-DE87-44BF-A148-E5C5C403C4F2','B8C8B812-174D-4D39-8E6C-634C4AD6ED67','F4C316F0-C4DB-4E8E-9A61-A489CC5024EA','0B62851E-7DA2-40DC-ACFA-49771F5468F4','389DB341-9D02-440A-B24D-7B4B5B3F3920'].map(air)
  },

  /* ─── 11: La Cadière-d'Azur Villa with Elevator, Provence ─── */
  {
    id:11, agent:1, badge:'Provençal Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-2814173-s3pxr5/la-cadiere-d-azur-contemporary-villa-with-pool-and-elevator-la-cadiere-d-azur-pr-83740',
    type:'Villa · For Sale',
    name:"La Cadière-d'Azur — Villa with Elevator",
    address:"La Cadière-d'Azur, Var, Provence, France",
    price:'Price Upon Request',
    area:280, beds:5, baths:5, garage:2,
    mapSrc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10000!2d5.7430!3d43.1810!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9b7c3d2a1e4f5%3A0x6b7c8d9e0f1a2b3c!2sLa%20Cadiere-d-Azur%2C%20Var!5e0!3m2!1sfr!2sfr!4v1700000000016",
    desc:"A beautifully appointed contemporary villa in La Cadière-d'Azur in the Var. A private lift connects the living levels; the main reception floor opens onto generous terraces with panoramic views towards the Mediterranean. A heated infinity pool with automatic cover and pool house complete the outdoor offering. Surrounded by mature Provençal gardens with complete privacy.",
    features:['Contemporary design · Private elevator','Infinity pool + pool house','Panoramic Var & Mediterranean views','Mature Provençal gardens','Complete privacy · Gated entry','Air conditioning & underfloor heating','Wine country location',"Marseille Sotheby's International Realty"],
    imgs:['389DB341-9D02-440A-B24D-7B4B5B3F3920','0B62851E-7DA2-40DC-ACFA-49771F5468F4','F4C316F0-C4DB-4E8E-9A61-A489CC5024EA','B8C8B812-174D-4D39-8E6C-634C4AD6ED67','42460EC0-DE87-44BF-A148-E5C5C403C4F2','A879F364-AA48-4518-B0C2-70D9953C87E7','FC61139D-1078-4883-9BB7-DF40829ACF2E','F0CD5DD2-ACE8-4C69-A511-B3A71FAA5753','A29535AE-9813-447A-B58D-403B52705DB9','05B4CC3B-7750-4100-90AD-474B450F6E66','FE1AB142-8F87-4396-9C12-20C95BA0E817','551F5F10-ABC3-4DC9-AC41-F17A024F2D4C','30BE3F19-9827-459E-B347-C9A6AD06C57D','13C03D02-6577-4CC1-A571-AC4BFA22C0A7','47F1DE2D-9B0F-4103-A18C-471AC75B005B','4F5F244D-1631-4498-AB53-E2BB9A948E38','37DC75DB-C2FD-4426-BB2E-5DBCB18454E3'].map(air)
  },

  /* ─── 12: Groot Haesebroekseweg 61, Wassenaar ─── */
  {
    id:12, agent:1, badge:'English Country House',
    sirUrl:'https://www.sothebysrealty.com/id/g7sz3w',
    type:'Villa · For Sale',
    name:'Groot Haesebroekseweg 61',
    address:'Wassenaar, South Holland, Netherlands',
    price:'€ 3,490,000',
    area:586, beds:9, baths:7, garage:0,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2456!2d4.3800!3d52.1470!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b2e2000001ef%3A0x0000000000000002!2sGroot%20Haesebroekseweg%2061%2C%20Wassenaar!5e0!3m2!1snl!2snl!4v1700000000021',
    desc:"At Groot Haesebroekseweg 61 in Wassenaar lies this delightful family home, built in 1929 under the architecture of Marinus van de Wall — renowned for his English country house style. In 2015 the current owners completely and luxuriously renovated the house. The country house offers 586 m² of living space on a plot of over 2,200 m² with a beautifully landscaped south-facing garden.",
    features:['586 m² · 2,210 m² landscaped plot','Built 1929 · Marinus van de Wall','Fully renovated 2015','South-facing terrace & garden','9 bedrooms · 7 bathrooms','Home office · Au pair accommodation','Watering system with own source',"Netherlands Sotheby's International Realty"],
    imgs:['C4FA7469-BDB2-453E-AC9A-A844A97448FD','42387CA3-9DD2-4182-9B95-8065CD3D1BDA','037A5AC7-031B-4FA2-A131-1D292B09D1A9','8C6959F7-ABDB-4E4F-854A-74784C8AEAAC','3925C732-CC74-4CB0-8AF8-3E262D8E85E5','EE832775-81B4-40CC-92BA-12BFEED84D4B','8640BE8E-B7F4-43F2-8462-BA7972057B8E','C5C1C30C-D1EC-45E1-AB43-B3CE010596EF','6B4EF057-5BB7-47BA-9E59-3C88EEF1768A','313A75D2-2F8B-45FE-95B9-7E0536D46D22','161E8AE4-C332-4592-825C-E4EB5CE3A421','25A6970C-2ABC-4129-BCF6-E3FDB803B0AF','1E7452ED-746F-4053-971C-E95B98C793A6','7590D177-4B6F-4582-81E8-AFD336FC6001','6C208871-7C69-4DD4-92BB-CF3CC8EB7F30','57FCE3CD-3AAC-443E-887A-63424407432B','9F8E98C8-7D7F-4EE9-9BF3-D598D9328ED4','46EB126E-60EC-40C0-B5DA-0314B59DF88C','77147754-106D-4155-A304-C7429C8144E2','09F1AD63-EB41-4116-9FF6-E6AFC86F2C67','3A69E07F-C399-4A7F-A611-00B13B93DDF4','392C8DF3-3CAC-4B39-B2E0-19CA628D32D6','9BE4D7E0-218F-4B66-9C3E-B052DD0E55CB','87994923-4798-4CEA-B5B5-93D0D0F36862','D9092CBF-D882-4164-97F4-7739A4153E0D','CC92FD05-47DE-4F81-A263-5BF0B29A186F','B40562AB-82A5-4B5D-ADEE-19796C9CC420','BC21CFF1-8A2A-424C-BFFD-ABCBA39140B9','343A824F-F16E-432E-BFBA-6B91B7C639D4','247EECCF-D4B7-49A8-A7B3-164F3BC9B5B0','FE822C5D-156D-47EC-854A-93C5FE6B9401','FA3F917B-5096-47D3-A134-828DF6B3E8DA','6C7C6DDD-0ABA-482F-A318-6655F620218D','C83EFC2E-CC67-4633-A43D-6847C6C3A0A7','8E076BCB-6723-4C1D-9F90-57EC494045C4','6AB05E33-D28B-41F9-B40D-8C7C407D91B8','CEEFB44B-5C4C-4BDF-90AF-C3725DC89423','0AC6E69D-03BA-407C-B434-01BDC057D352','64E8538E-3866-4C0E-AFF8-AB54958B44B9','522E161C-DBB5-4119-931C-E09F5A3EEB0D','9AA04D5A-A607-4327-A191-7F3CD8924F65','358B0CCE-D575-4FCE-BDB9-23DACF60DE4F','42C8BAD9-0DB9-4F52-BACE-9214F38B8E28','37ED597F-97FA-4E87-944F-10965D2D6639','EBF77961-2467-4B01-8ACC-D4227001978A','CD028CC5-864D-4DA6-AB90-CF2E19C42C94','6821FD5E-EB55-4101-9913-59148686A322','4376BF95-D4C1-40D0-8F05-980A9A759744'].map(air)
  },

  /* ─── 13: Dorpsstraat 61, Loenen aan de Vecht ─── */
  {
    id:13, agent:2, badge:'National Monument',
    sirUrl:'https://www.sothebysrealty.com/id/64f426',
    type:'Canal House · For Sale',
    name:'Dorpsstraat 61',
    address:'Loenen aan de Vecht, Utrecht, Netherlands',
    price:'€ 4,000,000',
    area:502, beds:5, baths:4, garage:1,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2446!2d4.9940!3d52.2330!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c62b8b0000001f%3A0x0000000000000003!2sDorpsstraat%2061%2C%20Loenen%20aan%20de%20Vecht!5e0!3m2!1snl!2snl!4v1700000000022',
    desc:"In the heart of picturesque Loenen aan de Vecht stands national monument 'Welgelegen', a characterful townhouse dating from around 1730. This spacious family home offers approximately 502 m² of living space combining historic charm with modern comfort. With views of the River Vecht, windmill 'De Hoop' and the village church, it is an ideal place to live and work. The property features a stately front garden with private mooring, a large walled rear garden, spacious garage and private parking.",
    features:["National monument 'Welgelegen' (c.1730)",'502 m² · 1,492 m² walled garden','Private mooring on the River Vecht','Fireplaces · Vaulted ceilings','Marble & terracotta original floors','Garage + private gated parking','Between Amsterdam, Utrecht & Hilversum',"Netherlands Sotheby's International Realty"],
    imgs:['1CA0A2C3-05E6-4048-A10B-24FB6ED01898','69E27FAB-4ED1-457C-B3C9-F952293DDA05','AFD7C456-189E-4674-9548-688BAA1049B5','2A1C3E77-49A9-4D4C-AFC9-12D11CF06B2E','E7FDAA0B-11A2-4CA1-BB79-2E4E8C635126','52B4C788-07BD-48ED-AE2E-8F6A5BD15A18','EC632F88-7695-4C1F-94D8-00A2D65A64E2','46C102BC-6D5A-4E71-8333-EDB3B5FD8C49','F73889A2-59DA-420A-ACAA-3E908019F6F4','5AA1A898-4D67-4410-9578-3EA8EC956CE0','3815DBD7-1579-43BF-ABF9-C072F5FAE1E0','BFA73F4B-3587-4F56-9B90-F3D8E022A1C2','0C35A315-621F-430F-AC71-5F7D598058BC','AF752C26-C585-4C2C-8833-A0D4F4556207','FE19D851-C170-4AB7-A5AF-15D99566CEE0','A4D5B7CE-F09D-44CB-94CB-9C17B52EC83B','438D60FA-8498-46B1-A9CB-DEB873B6E25A','ABEEDE01-6AB2-45B6-AAF8-8AD8760E796C','8D90C821-9174-4A05-AAD7-1F1605BC6E84','C6EB310E-48E2-4995-8A85-26F3C5851C7A','D552AAAB-4F27-4ECD-AF1A-3AB5443379EA','E6D9FA01-56A5-44A2-B6A6-07C52E2224B5','B668153E-85A2-4154-A3D1-26E28C2ED87E','C5A7840B-9B87-4127-9D09-994CC5AF8632','C1023527-CBB6-4CC0-8316-041650056E2B','ACEE73ED-39DA-4086-BAA6-C1822B5E0606','1AB24527-439D-4AB7-A130-0515DA49749E','BDC0D40B-3813-4367-B0CF-85596BE22FB5','15122702-4686-4050-B624-8AC5E08A9B68','8CC93A2D-90E5-48A8-8D83-F73D8ADC57DB','C46A1816-59E9-4A38-9937-0175BFA6CDBE','FE9E100C-3842-48B4-8911-C5D135481191','EAD7A766-9A33-4F56-A451-05724C5DA895','2352E0BA-116B-4018-812D-B03C0D054D17','D1C79F3B-818F-4BA3-A309-AC46723D4623','24B1FBB3-5B28-4057-B889-6533874BCFF2','C9F2F7EF-0059-419B-AA30-3BCEF86AF696','B9EC292A-7E35-475A-BE59-19F0BF48E7C0','DA99D22C-5C48-4CF2-AAD5-13D1DE67E6B7','BF7EBFB7-B2F7-482D-8D21-10E319D0169B','6D01B1B5-0E02-42B4-97CD-275A9752FAB8','FBA845BD-611B-485A-BE08-8E03B7F689ED','FD6BF740-FC06-4572-8647-B66DEB9C7B40','E08AFF39-6A8C-4FC2-90A6-D2B8EE860719','5BE2514C-1CFF-4926-87BD-046C1F15E9EB','D32BE590-D610-434E-BA49-6EE10F27788F','3C1CF700-3831-4113-BB32-02ADFB9BF021','0B2404A9-0707-41C6-A212-E5076D0B2C7B','C9EA2EA5-56BE-4559-B916-AC0A3216BA6A','BBDECF70-71A7-411E-AB33-204948D1C172','B1BFF63C-C435-4A01-BDDA-E8D569214025','E1811E1A-6F2A-465D-A790-DDD790FA725C','2C6D44A7-FDB9-4C53-947E-0973147D19B6','AD7406C2-78E1-45A8-B2E5-487C556A53F1','F12A4DEF-2A1C-4434-A673-DF2FD840027C','72CA6D2B-8051-419A-959D-301D7EFE200A','EEA9B4AE-7B75-45FB-B1CA-BB2047C60720','FB284661-7E86-498B-9826-853E4890E972','DE52CA18-4DE5-407C-9F12-39903869D9D4'].map(air)
  },

  /* ─── 14: Nieuwezijds Voorburgwal 284, Amsterdam ─── */
  {
    id:14, agent:1, badge:'National Monument',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-83714-5f8bkn/nieuwezijds-voorburgwal-284-amsterdam-nh-1012-rt',
    type:'Canal House · For Sale',
    name:'Nieuwezijds Voorburgwal 284',
    address:'Nieuwezijds Voorburgwal, Amsterdam Centrum, Netherlands',
    price:'€ 3,950,000',
    area:505, beds:5, baths:4, garage:0,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436!2d4.8936!3d52.3731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609e5b3a2c3a7%3A0x1234abcd5678ef90!2sNieuwezijds%20Voorburgwal%20284%2C%201012%20RT%20Amsterdam!5e0!3m2!1snl!2snl!4v1700000000035',
    desc:"A uniquely and superbly renovated monumental canal house in the vibrant heart of Amsterdam — just behind Dam Square. This Rijksmonument at Nieuwezijds Voorburgwal 284 is a rare opportunity to own an exceptional property steeped in history yet finished to the very highest contemporary standard. The house spans approximately 505 m² across five full floors and is richly appointed with original period features throughout, combined with all modern amenities. The bespoke kitchen opens to a tranquil walled garden of approximately 44 m². A permit for a roof terrace has already been granted by the Municipality of Amsterdam.",
    features:[
      '505 m² · Five full floors',
      'Rijksmonument — National Listed Building',
      'Just behind Dam Square · Prime Centrum',
      'Bespoke kitchen · All modern appliances',
      'Master bedroom with walk-in closet',
      '2 bedrooms with en-suite bathrooms',
      'Spectacular top-floor bedroom with freestanding bath',
      'Walled garden 44 m² · Roof terrace permit granted',
      'Leasehold paid off until 31 Dec 2026',
      "Netherlands Sotheby's International Realty"
    ],
    imgs:[
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-1.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-2.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-3-1-scaled.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-4.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-5.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-6.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-7.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-8.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-9.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-10.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-11.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-12.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-13.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-14.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-15.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-16.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-17.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-18.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-19.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-20.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-21.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-22.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-23.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-24.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-25.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-26.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-27.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-28.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-29.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-30.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-31.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-32.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-33.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-34.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-35.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-36.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-37.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-38.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-39.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-40.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-41.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-42.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-43.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-44.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-45.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-46.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-47.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-48.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-49.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-50.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-51.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-52.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-53.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-54.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-55.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-56.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-57.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-58.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-59.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-60.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-61.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-62.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-63.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-64.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-65.jpeg'
    ]
  },

  /* ─── 15: Koningslaan 28, Amsterdam ─── */
  {
    id:15, agent:0, badge:'Garden Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/amsterdam-nl-usa',
    type:'Villa · For Sale',
    name:'Koningslaan 28',
    address:'Oud-Zuid, Amsterdam, Netherlands',
    price:'€ 8,900,000',
    area:680, beds:6, baths:5, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436!2d4.8700!3d52.3540!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609e00000002f%3A0xb2c3d4e5f6a70002!2sKoningslaan%2028%2C%201075%20AE%20Amsterdam!5e0!3m2!1snl!2snl!4v1700000000031',
    desc:"On Amsterdam's most distinguished tree-lined boulevard, Koningslaan, stands this exceptional 1920s villa of considerable charm and architectural distinction — designed in the Amsterdam School tradition. Set behind a private gate on a generous south-facing plot of 1,100 m², the villa offers 680 m² of living space across three floors. The interior has been comprehensively reimagined: a sweeping entrance hall, a grand double living room with two fireplaces, and a state-of-the-art kitchen opening to a sun-drenched rear terrace and mature walled garden. Vondelpark is a 2-minute walk.",
    features:['680 m² · 1,100 m² south-facing plot','Amsterdam School architecture (1920s)','Double living room · Two fireplaces','State-of-the-art kitchen','Rooftop terrace · Garden studio','Secure private parking for 2 cars','Private walled garden','2 min. walk to Vondelpark'],
    imgs:[
      unsp('1600566752355-35792bedcfea'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600047509807-ba8f99d2cdde'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1600210492493-0946911123ea'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1556912173-3bb406ef7e77'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1484154218962-a197022b5858'),
      unsp('1583608205776-bfd35f0d9f83'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1493809842364-78817add7ffb'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1597072689227-8882273e8f6a')
    ]
  },

  /* ═══════════════════════════════════════
     NEW INTERNATIONAL LISTINGS
  ═══════════════════════════════════════ */

  /* ─── 16: Chelsea, London ─── */
  {
    id:16, agent:3, badge:'Freehold Mansion',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/london-england',
    type:'Town House · For Sale',
    name:'Cheyne Walk Residence',
    address:'Chelsea, London SW3, England',
    price:'£ 14,500,000',
    area:520, beds:6, baths:5, garage:1,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2484!2d-0.1718!3d51.4845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760352f8f9b5a9%3A0x1b2e3c4d5e6f7a8b!2sCheyne%20Walk%2C%20London!5e0!3m2!1sen!2sgb!4v1700000000040',
    desc:"An exceptional freehold Georgian town house of considerable grandeur on one of London's most distinguished riverside addresses — Cheyne Walk in Chelsea. Spanning 520 m² across six floors, this meticulously restored property offers an extraordinary combination of period elegance and contemporary luxury. The principal reception rooms feature original cornicing, marble fireplaces, and double-height ceilings. A private walled garden, roof terrace, and integral garage complete this world-class London residence within moments of the Thames Embankment.",
    features:['520 m² · Freehold Georgian town house','Six floors · Private walled garden','6 bedrooms · 5 bathrooms','Integral garage','Original cornicing & marble fireplaces','Roof terrace with Thames views','Chelsea — moments from the Embankment',"Savills International · SIR London"],
    imgs:[
      unsp('1600566752355-35792bedcfea'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1600210492493-0946911123ea'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1484154218962-a197022b5858'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1600121848594-d8644e57abab'),
      unsp('1556912173-3bb406ef7e77'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1583608205776-bfd35f0d9f83'),
      unsp('1493809842364-78817add7ffb'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1560448204-e02f11c3d0e2')
    ]
  },

  /* ─── 17: Upper East Side, New York ─── */
  {
    id:17, agent:3, badge:'Full-Floor Penthouse',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/new-york-ny-usa',
    type:'Penthouse · For Sale',
    name:'Fifth Avenue Penthouse',
    address:'Upper East Side, New York, NY 10065, USA',
    price:'$ 19,500,000',
    area:465, beds:4, baths:4, garage:0,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022!2d-73.9643!3d40.7736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f00000001%3A0xabcdef1234567890!2sFifth%20Avenue%2C%20New%20York!5e0!3m2!1sen!2sus!4v1700000000050',
    desc:"A magnificent full-floor penthouse crowning one of Fifth Avenue's most coveted pre-war buildings, directly facing Central Park. At 465 m², this incomparable residence offers four bedrooms, four baths, and a sweeping wrap-around terrace with unobstructed 270° views over Central Park, the Manhattan skyline, and the Hudson River. The principal reception rooms were designed by an award-winning New York studio, featuring chevron oak floors, custom millwork, and a chef's kitchen with Calacatta marble. White-glove building with 24-hour doorman and full-service concierge.",
    features:['465 m² · Full-floor residence','Wrap-around terrace · Central Park views','4 bedrooms · 4 baths','Award-winning interior design','Pre-war building with white-glove service','24h doorman & concierge','Calacatta marble kitchen','Fifth Avenue — steps from The Met'],
    imgs:[
      unsp('1600566752355-35792bedcfea'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1600210492493-0946911123ea'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1484154218962-a197022b5858'),
      unsp('1556912173-3bb406ef7e77'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1583608205776-bfd35f0d9f83'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600121848594-d8644e57abab')
    ]
  },

  /* ─── 18: Miami Beach, Florida ─── */
  {
    id:18, agent:3, badge:'Waterfront Estate',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/miami-fl-usa',
    type:'Villa · For Sale',
    name:'La Gorce Island Estate',
    address:'La Gorce Island, Miami Beach, FL 33141, USA',
    price:'$ 24,900,000',
    area:890, beds:7, baths:8, garage:4,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3592!2d-80.1370!3d25.8106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b5b200000001%3A0xfedcba9876543210!2sLa%20Gorce%20Island%2C%20Miami%20Beach!5e0!3m2!1sen!2sus!4v1700000000051',
    desc:"An extraordinary waterfront estate on the exclusive and guard-gated La Gorce Island in Miami Beach — one of the most coveted private islands in South Florida. This stunning 890 m² contemporary residence was completely rebuilt in 2019 and offers 7 bedrooms, 8 bathrooms, a home cinema, wine cellar, and a professional-grade chef's kitchen. The 82-foot private dock accommodates a large yacht; the outdoor terraces feature a resort-style pool, spa, and a fully equipped summer kitchen with breathtaking Intracoastal Waterway views.",
    features:['890 m² · Gated island position','82-foot private yacht dock','7 bedrooms · 8 bathrooms','Rebuilt 2019 · Smart home system','Resort pool · Spa · Summer kitchen','Home cinema · Wine cellar','Intracoastal Waterway views',"One Sotheby's International Realty"],
    imgs:[
      unsp('1600047509807-ba8f99d2cdde'),
      unsp('1600566752355-35792bedcfea'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1600210492493-0946911123ea'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600121848594-d8644e57abab'),
      unsp('1484154218962-a197022b5858'),
      unsp('1583608205776-bfd35f0d9f83')
    ]
  },

  /* ─── 19: 8th Arrondissement, Paris ─── */
  {
    id:19, agent:3, badge:'Haussmann Apartment',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/paris-france',
    type:'Apartment · For Sale',
    name:'Avenue Montaigne Residence',
    address:'8ème Arrondissement, Paris 75008, France',
    price:'€ 12,800,000',
    area:310, beds:4, baths:3, garage:1,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624!2d2.3073!3d48.8680!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fc4f8000001%3A0x1234567890abcdef!2sAvenue%20Montaigne%2C%20Paris!5e0!3m2!1sfr!2sfr!4v1700000000052',
    desc:"A superb Haussmann apartment of approximately 310 m² on the most prestigious floor — the piano nobile — of a magnificent 1890s building on Avenue Montaigne. This extraordinary residence was redesigned by one of Paris's foremost interior designers and features grand enfilades of reception rooms with 3.6m ceilings, original mouldings, and Eiffel Tower views from the principal rooms. The master suite is a private world unto itself. Private underground parking and a dedicated concierge service complete this incomparable Parisian address.",
    features:['310 m² · Piano nobile (3rd floor)','Haussmann building c.1890','Eiffel Tower views from principal rooms','3.6m ceilings · Original mouldings','4 bedrooms · 3 bathrooms','Private underground parking','Dedicated concierge','Avenue Montaigne — heart of the Golden Triangle'],
    imgs:[
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1484154218962-a197022b5858'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1600210492493-0946911123ea'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1600121848594-d8644e57abab'),
      unsp('1556912173-3bb406ef7e77'),
      unsp('1583608205776-bfd35f0d9f83'),
      unsp('1580587771525-78b9dba3b914')
    ]
  },

  /* ─── 20: Marbella, Spain ─── */
  {
    id:20, agent:3, badge:'Sea View Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/spanish-properties',
    type:'Villa · For Sale',
    name:'Sierra Blanca Villa',
    address:'Sierra Blanca, Marbella, Málaga, Spain',
    price:'€ 9,750,000',
    area:740, beds:6, baths:6, garage:3,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12789!2d-4.8813!3d36.5180!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f795a6a13f15%3A0x1a2b3c4d5e6f7890!2sSierra%20Blanca%2C%20Marbella!5e0!3m2!1ses!2ses!4v1700000000053',
    desc:"A masterpiece of contemporary architecture set within the exclusive gated community of Sierra Blanca — Marbella's most prestigious hillside address. This exceptional 740 m² villa was designed by an award-winning international architect and occupies a prime elevated position with uninterrupted panoramic views of the Mediterranean and the Marbella coastline. The interior features a grand double-height living room, gourmet kitchen, six en-suite bedrooms, and a magnificent cinema room. The outdoor entertaining areas include an infinity pool, outdoor kitchen, and landscaped terraced gardens.",
    features:['740 m² · Sierra Blanca gated estate','Panoramic Mediterranean sea views','6 bedrooms, all en-suite','Infinity pool · Outdoor kitchen','Cinema room · Wine cellar','Smart home automation system','24h security & concierge',"Drumelia Real Estate · SIR Spain"],
    imgs:[
      unsp('1600566752355-35792bedcfea'),
      unsp('1600047509807-ba8f99d2cdde'),
      unsp('1600210492493-0946911123ea'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1484154218962-a197022b5858'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1600121848594-d8644e57abab'),
      unsp('1556912173-3bb406ef7e77')
    ]
  },

  /* ─── 21: Cascais, Portugal ─── */
  {
    id:21, agent:3, badge:'Clifftop Villa',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/portugal',
    type:'Villa · For Sale',
    name:'Villa Atlântico',
    address:'Cascais, Lisbon District, Portugal',
    price:'€ 7,200,000',
    area:580, beds:5, baths:5, garage:2,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12393!2d-9.4221!3d38.6979!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1ece8b38c1f2a7%3A0x9a8b7c6d5e4f3a2b!2sCascais%2C%20Portugal!5e0!3m2!1spt!2spt!4v1700000000054',
    desc:"A breathtaking clifftop villa of 580 m² in the most sought-after position in Cascais — with dramatic Atlantic Ocean views from every principal room. This architectural masterpiece was completed in 2020 by a celebrated Portuguese studio and harmoniously blends stone, glass, and reclaimed wood. The interiors flow seamlessly to a series of generous ocean-facing terraces. Five bedrooms each have en-suite bathrooms and direct terrace access. A private path leads to a secluded rocky cove below. Cascais town centre and the Estoril Casino are within 10 minutes.",
    features:['580 m² · Clifftop Atlantic position','Panoramic ocean views throughout','5 bedrooms, all en-suite','Private path to rocky ocean cove','Built 2020 · Sustainable architecture','Reclaimed stone & glass design','10 min to Cascais town & Estoril',"Portugal Sotheby's International Realty"],
    imgs:[
      unsp('1600047509807-ba8f99d2cdde'),
      unsp('1600566752355-35792bedcfea'),
      unsp('1522708323590-d24dbb6b0267'),
      unsp('1560448204-e02f11c3d0e2'),
      unsp('1502672260266-1c1ef2d93688'),
      unsp('1597072689227-8882273e8f6a'),
      unsp('1524758631624-e2822e304c36'),
      unsp('1600047509358-9dc75507daeb'),
      unsp('1567767292278-a4f21aa2d36e'),
      unsp('1630699144867-37acec97df5a'),
      unsp('1600210492493-0946911123ea'),
      unsp('1631679706909-1844bbd07221'),
      unsp('1600596542815-ffad4c1539a9'),
      unsp('1484154218962-a197022b5858'),
      unsp('1580587771525-78b9dba3b914'),
      unsp('1600121848594-d8644e57abab')
    ]
  },

  /* ─── 22: Antelo View Estate, Bel Air, Los Angeles ─── */
  {
    id:22, agent:3, badge:'Bel Air Estate',
    sirUrl:'https://www.sothebysrealty.com/eng/sales/detail/180-l-1187-h3xgcz/2911-antelo-view-drive-bel-air-los-angeles-ca-90077',
    type:'Estate · For Sale',
    name:'Antelo View Estate',
    address:'2911 Antelo View Drive, Bel Air, Los Angeles, CA 90077, USA',
    price:'$ 35,000,000',
    area:1427, beds:9, baths:14, garage:4,
    mapSrc:'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305!2d-118.4564!3d34.0920!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04a7a4b1c1%3A0xabcdef1234567890!2s2911%20Antelo%20View%20Dr%2C%20Los%20Angeles%2C%20CA%2090077!5e0!3m2!1sen!2sus!4v1700000000055',
    desc:"The Antelo View Estate stands as one of Los Angeles' most distinguished and irreplaceable residences, tucked at the end of a secluded private road in Bel Air. Set across two APNs totalling 5.36 acres of lush park-like grounds, behind double gates with a sweeping motor court, the estate commands spectacular city, mountain, and ocean views. The 6-bedroom, 9-bath main residence was completely reimagined by top LA design-build teams. A state-of-the-art custom kitchen features white oak cabinetry, Calacatta marble, and Miele & Gaggenau appliances. Lower level includes a movie theatre with bar, wine storage, gym and steam shower. Two detached guest houses, a resort pool with cabana, tennis court, and a private golf cart circuit complete this once-in-a-generation Bel Air trophy estate.",
    features:[
      '1,427 m² · 5.36 acres (two APNs)',
      'Double-gated · Private road · Motor court',
      'City, mountain & ocean views',
      '6-bed 9-bath main residence',
      'Custom kitchen · Miele & Gaggenau',
      'Movie theatre · Wine storage · Gym',
      'Two detached guest houses (3,000 + 1,000 sf)',
      'Resort pool · Cabana · Tennis court',
      'Golf cart circuit · Romantic loggia',
      "Sotheby's International Realty – Sherman Oaks"
    ],
    imgs:[
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-66.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-67.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-68.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-69.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-70.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-71.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-72.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-73.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-74.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-75.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-76.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-77.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-78.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-79.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-80.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-81.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-82.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-83.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-84.jpeg',
      'http://mw-leerlingen.nl/127004/wp-content/uploads/2026/04/Afbeelding-85.jpeg'
    ]
  }

];

/* ═══════════════════════════════════════
   HERO SLIDESHOW
═══════════════════════════════════════ */
let heroIdx=0;
function initHero(){
  const slides=document.getElementById('heroSlides');
  const dots=document.getElementById('heroDots');
  const hp=[props[0],props[5],props[7],props[17],props[18],props[22],props[16],props[1],props[19]];
  hp.forEach((p,i)=>{
    const s=document.createElement('div');
    s.className='hero-slide'+(i===0?' active':'');
    s.style.backgroundImage=`url(${p.imgs[0]})`;
    slides.appendChild(s);
    const d=document.createElement('div');
    d.className='hero-dot'+(i===0?' active':'');
    d.onclick=()=>goHero(i);
    dots.appendChild(d);
  });
  setInterval(()=>goHero((heroIdx+1)%hp.length),6000);
}
function goHero(i){
  document.querySelectorAll('.hero-slide').forEach((s,j)=>s.classList.toggle('active',j===i));
  document.querySelectorAll('.hero-dot').forEach((d,j)=>d.classList.toggle('active',j===i));
  heroIdx=i;
}

/* ═══════════════════════════════════════
   HOME GRID — 6 featured properties
═══════════════════════════════════════ */
function buildHomeGrid(){
  const feat=[17,22,18,16,0,7];
  document.getElementById('homeGrid').innerHTML=feat.map((pid,fi)=>{
    const p=props.find(x=>x.id===pid);
    if(!p)return '';
    return `<div class="listing-card" onclick="openProp(${p.id})" style="${fi===0?'grid-row:span 2;aspect-ratio:auto':''}">
      <img class="listing-img" src="${p.imgs[0]}" alt="${p.name}" loading="lazy">
      <div class="listing-overlay"></div>
      <button class="listing-photo-btn" onclick="event.stopPropagation();openLB(${p.id},0)">📷 Gallery</button>
      <div class="listing-info">
        <div class="listing-badge">${p.badge}</div>
        <div class="listing-name">${p.name}</div>
        <div class="listing-location">${p.address}</div>
        <div class="listing-price">${p.price}</div>
        <div class="listing-details"><span>🛏 ${p.beds} bed</span><span>🛁 ${p.baths} bath</span><span>📐 ${p.area} m²</span></div>
      </div>
    </div>`;
  }).join('');
}

function buildRecentGrid(){
  const rec=[21,20,19,16];
  document.getElementById('recentGrid').innerHTML=rec.map(pid=>{
    const p=props.find(x=>x.id===pid);
    if(!p)return '';
    return `<div class="recent-card reveal" onclick="openProp(${p.id})">
      <div class="recent-img-wrap"><img src="${p.imgs[0]}" alt="${p.name}" loading="lazy"></div>
      <div class="recent-body">
        <div class="recent-type">${p.type}</div>
        <div class="recent-name">${p.name}</div>
        <div class="recent-loc">${p.address}</div>
        <div class="recent-footer"><div class="recent-price">${p.price}</div><div class="recent-specs">${p.beds} bd · ${p.area} m²</div></div>
      </div>
    </div>`;
  }).join('');
}

/* ═══════════════════════════════════════
   SEARCH — functional location + type + price filter
═══════════════════════════════════════ */
function runSearch(){
  const loc = document.getElementById('searchLocation').value.toLowerCase();
  const type = document.getElementById('searchType').value.toLowerCase();
  const maxP = parseInt(document.getElementById('searchPrice').value) || Infinity;

  /* Parse price string to number for comparison */
  function parsePrice(str){
    if(!str || str === 'Price Upon Request') return 0;
    const n = str.replace(/[^0-9]/g,'');
    return parseInt(n) || 0;
  }

  let results = props.filter(p=>{
    const addr = p.address.toLowerCase();
    const t = p.type.toLowerCase();
    const price = parsePrice(p.price);
    const locOk = !loc || addr.includes(loc) || p.name.toLowerCase().includes(loc);
    const typeOk = !type || t.includes(type.toLowerCase());
    const priceOk = maxP === Infinity || price === 0 || price <= maxP;
    return locOk && typeOk && priceOk;
  });

  /* Set title and display on location sub-page */
  const locLabel = document.getElementById('searchLocation').selectedOptions[0]?.text || 'All Locations';
  document.getElementById('locationPageTitle').innerHTML = `Search <em>Results</em>`;
  buildGridFromList('grid-location', results);
  go('location');
}

function filterByLocation(keyword){
  const results = props.filter(p => p.address.toLowerCase().includes(keyword.toLowerCase()));
  document.getElementById('locationPageTitle').innerHTML = `Properties in <em>${keyword}</em>`;
  buildGridFromList('grid-location', results);
  go('location');
}

/* ═══════════════════════════════════════
   DROPDOWN — JS hover bridge (stable)
═══════════════════════════════════════ */
(function(){
  const item = document.getElementById('navPropertiesItem');
  const dropdown = document.getElementById('navDropdown');
  let closeTimer = null;

  function openDD(){ clearTimeout(closeTimer); item.classList.add('dd-open'); }
  function scheduleClose(){ closeTimer = setTimeout(()=>item.classList.remove('dd-open'), 180); }

  item.addEventListener('mouseenter', openDD);
  item.addEventListener('mouseleave', scheduleClose);
  dropdown.addEventListener('mouseenter', openDD);
  dropdown.addEventListener('mouseleave', scheduleClose);
  /* Touch support */
  item.querySelector('a').addEventListener('click', ()=>{
    item.classList.toggle('dd-open');
  });
})();

function closeDropdown(){
  document.getElementById('navPropertiesItem').classList.remove('dd-open');
}

/* ═══════════════════════════════════════
   NAV & ROUTING
═══════════════════════════════════════ */
const navEl=document.getElementById('navbar');
window.addEventListener('scroll',()=>navEl.classList.toggle('scrolled',window.scrollY>60));
let prevPageId='home';

function go(id){
  const cur=document.querySelector('.page.active');
  if(cur){ prevPageId=cur.id.replace('page-',''); cur.classList.remove('active'); }
  const t=document.getElementById('page-'+id);
  if(!t)return;
  t.classList.add('active');
  window.scrollTo(0,0);
  initReveals();
  const gm={
    woningen:null,
    villas:['villa','estate'],
    penthouses:['penthouse'],
    nieuwbouw:['new build','nieuwbouw','2023','2024'],
    appartementen:['apartment','penthouse']
  };
  if(id in gm) buildGrid('grid-'+id, gm[id]);
}

function goBack(){ go(prevPageId||'woningen'); }

function buildGrid(cid, filter){
  const el=document.getElementById(cid);
  if(!el)return;
  const items = filter
    ? props.filter(p=>filter.some(f=>p.type.toLowerCase().includes(f)||p.badge.toLowerCase().includes(f)||p.desc.toLowerCase().includes(f)))
    : props;
  buildGridFromList(cid, items);
}

function buildGridFromList(cid, items){
  const el=document.getElementById(cid);
  if(!el)return;
  if(items.length===0){
    el.innerHTML='<p style="padding:2rem;opacity:.5;grid-column:1/-1">No properties found matching your search.</p>';
    return;
  }
  el.innerHTML=items.map(p=>`
    <div class="subpage-card" onclick="openProp(${p.id})">
      <div class="subpage-card-img"><img src="${p.imgs[0]}" alt="${p.name}" loading="lazy"></div>
      <div class="subpage-card-body">
        <div class="subpage-card-type">${p.type}</div>
        <div class="subpage-card-name">${p.name}</div>
        <div class="subpage-card-loc">${p.address}</div>
        <div class="subpage-card-footer">
          <div class="subpage-card-price">${p.price}</div>
          <span style="font-size:.68rem;opacity:.48">${p.beds} bd · ${p.area} m²</span>
        </div>
      </div>
    </div>`).join('');
}

/* ═══════════════════════════════════════
   PROPERTY DETAIL
═══════════════════════════════════════ */
window._curProp=0; window._propImgI=0;

function openProp(idx){
  const p=props.find(x=>x.id===idx);
  if(!p)return;
  const ag=agents[p.agent] || agents[0];
  const curId=document.querySelector('.page.active')?.id.replace('page-','')||'home';
  if(curId!=='property') prevPageId=curId;
  document.getElementById('propHeroImg').src=p.imgs[0];
  document.getElementById('propType').textContent=p.type;
  document.getElementById('propTitle').textContent=p.name;
  document.getElementById('propAddress').textContent=p.address;
  document.getElementById('propPrice').textContent=p.price;
  document.getElementById('propCounter').textContent=`1 / ${p.imgs.length}`;
  document.getElementById('propDesc').textContent=p.desc;
  document.getElementById('propSpecs').innerHTML=`
    <div><span class="prop-spec-val">${p.beds}</span><span class="prop-spec-lbl">Bedrooms</span></div>
    <div><span class="prop-spec-val">${p.baths}</span><span class="prop-spec-lbl">Bathrooms</span></div>
    <div><span class="prop-spec-val">${p.area}</span><span class="prop-spec-lbl">Floor area m²</span></div>
    <div><span class="prop-spec-val">${p.garage}</span><span class="prop-spec-lbl">Garage</span></div>`;
  document.getElementById('propFeatures').innerHTML=p.features.map(f=>`<div class="prop-feature">${f}</div>`).join('');
  document.getElementById('propMap').src=p.mapSrc;
  document.getElementById('propLBBtn').onclick=()=>openLB(idx,0);
  document.getElementById('agentAvatar').src=ag.avatar;
  document.getElementById('agentName').textContent=ag.name;
  document.getElementById('agentRole').textContent=ag.role;
  document.getElementById('agentInfo').innerHTML=ag.info.replace(/\n/g,'<br>');

  const badge=document.getElementById('sothebysLink');
  if(p.sirUrl){
    badge.innerHTML=`<a href="${p.sirUrl}" target="_blank" rel="noopener noreferrer" style="color:var(--gold);text-decoration:none;font-size:.6rem;letter-spacing:.15em;text-transform:uppercase">VIEW ON SOTHEBY'S INTERNATIONAL REALTY ↗</a>`;
  } else {
    badge.textContent="Listed exclusively with Sotheby's International Realty";
  }

  document.getElementById('galleryStrip').innerHTML=p.imgs.map((img,i)=>
    `<img class="g-thumb ${i===0?'active':''}" src="${img}" alt="Photo ${i+1}" onclick="setPropImg(${idx},${i})" loading="lazy">`).join('');
  window._curProp=idx; window._propImgI=0;
  go('property');
}

function setPropImg(pi,i){
  window._propImgI=i;
  const p=props.find(x=>x.id===pi);
  if(!p)return;
  document.getElementById('propHeroImg').src=p.imgs[i];
  document.getElementById('propCounter').textContent=`${i+1} / ${p.imgs.length}`;
  document.querySelectorAll('.g-thumb').forEach((t,j)=>t.classList.toggle('active',j===i));
}

function propNav(dir){
  const p=props.find(x=>x.id===window._curProp);
  if(!p)return;
  const n=p.imgs.length;
  window._propImgI=(window._propImgI+dir+n)%n;
  setPropImg(window._curProp,window._propImgI);
}

/* ═══════════════════════════════════════
   LIGHTBOX
═══════════════════════════════════════ */
let lbProp=0, lbImgI=0;
function openLB(pi,ii){ lbProp=pi; lbImgI=ii; renderLB(); document.getElementById('lightbox').classList.add('open'); document.body.style.overflow='hidden'; }
function renderLB(){
  const p=props.find(x=>x.id===lbProp);
  if(!p)return;
  document.getElementById('lbImg').src=p.imgs[lbImgI];
  document.getElementById('lbCaption').textContent=`${p.name} — Photo ${lbImgI+1} of ${p.imgs.length}`;
  document.getElementById('lbStrip').innerHTML=p.imgs.map((img,i)=>
    `<img class="lb-thumb ${i===lbImgI?'active':''}" src="${img}" alt="" onclick="lbGoTo(${i})" loading="lazy">`).join('');
}
function lbGoTo(i){ lbImgI=i; renderLB(); }
function lbNav(dir){ const p=props.find(x=>x.id===lbProp); if(!p)return; const n=p.imgs.length; lbImgI=(lbImgI+dir+n)%n; renderLB(); }
function closeLB(){ document.getElementById('lightbox').classList.remove('open'); document.body.style.overflow=''; }
function lbBgClose(e){ if(e.target===document.getElementById('lightbox'))closeLB(); }
document.addEventListener('keydown',e=>{
  if(!document.getElementById('lightbox').classList.contains('open'))return;
  if(e.key==='Escape')closeLB();
  if(e.key==='ArrowLeft')lbNav(-1);
  if(e.key==='ArrowRight')lbNav(1);
});

/* ═══════════════════════════════════════
   TESTIMONIALS CAROUSEL
═══════════════════════════════════════ */
let tcIdx=0;
function initTestimonials(){
  const cards=document.querySelectorAll('.testimonial-card');
  const visible=window.innerWidth<1024?1:3;
  const maxIdx=Math.max(0,cards.length-visible);
  const dotsEl=document.getElementById('tcDots');
  dotsEl.innerHTML='';
  for(let i=0;i<=maxIdx;i++){
    const d=document.createElement('div');
    d.className='tc-dot'+(i===0?' active':'');
    d.onclick=()=>goTC(i);
    dotsEl.appendChild(d);
  }
  document.getElementById('tcPrev').onclick=()=>goTC(Math.max(0,tcIdx-1));
  document.getElementById('tcNext').onclick=()=>goTC(Math.min(maxIdx,tcIdx+1));
  setInterval(()=>goTC(tcIdx+1>maxIdx?0:tcIdx+1),7000);
}
function goTC(i){
  const cards=document.querySelectorAll('.testimonial-card');
  const visible=window.innerWidth<1024?1:3;
  const maxIdx=Math.max(0,cards.length-visible);
  tcIdx=Math.max(0,Math.min(maxIdx,i));
  if(cards.length===0)return;
  const cardW=cards[0].offsetWidth+32;
  document.getElementById('testimonialTrack').style.transform=`translateX(-${tcIdx*cardW}px)`;
  document.querySelectorAll('.tc-dot').forEach((d,j)=>d.classList.toggle('active',j===tcIdx));
}

/* ═══════════════════════════════════════
   FORM
═══════════════════════════════════════ */
function formOK(e,form){
  e.preventDefault();
  const btn=form.querySelector('.submit-btn'); const orig=btn.textContent;
  btn.textContent='Message Sent ✓';
  btn.style.background='var(--gold)'; btn.style.color='var(--ink)'; btn.style.borderColor='var(--gold)';
  setTimeout(()=>{ btn.textContent=orig; btn.style.background=''; btn.style.color=''; btn.style.borderColor=''; },3500);
}

/* ═══════════════════════════════════════
   SCROLL REVEALS
═══════════════════════════════════════ */
function initReveals(){
  setTimeout(()=>{
    document.querySelectorAll('.page.active .reveal').forEach(el=>{
      if(el.getBoundingClientRect().top<window.innerHeight*1.15) el.classList.add('visible');
    });
  },80);
  const obs=new IntersectionObserver(entries=>{
    entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('visible'); });
  },{threshold:0.08});
  document.querySelectorAll('.page.active .reveal').forEach(el=>obs.observe(el));
}

/* ═══════════════════════════════════════
   INIT
═══════════════════════════════════════ */
document.addEventListener('DOMContentLoaded',()=>{
  initHero();
  buildHomeGrid();
  buildRecentGrid();
  initTestimonials();
  initReveals();
});
</script>

</body>
</html>
