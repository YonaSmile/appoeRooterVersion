<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/app/main.php' );
includePluginsFiles();
require_once( WEB_SYSTEM_PATH . 'auth_user.php' );
?>
<!doctype html>
<html lang="<?= LANG; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= WEB_TEMPLATE_URL; ?>images/appoe-favicon.png">
    <link rel="stylesheet" type="text/css" href="<?= WEB_TEMPLATE_URL; ?>css/appoe.css">
    <title>Connexion à <?= WEB_TITLE; ?></title>
    <style>
        html, body {
            background: hsla(260, 40%, 5%, 1);
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-animation: autofill 0s forwards;
            animation: autofill 0s forwards;
        }

        input,
        input:hover,
        input:focus,
        input:active {
            -webkit-appearance: none;
            box-shadow: none !important;
            outline: none;
            background-color: transparent !important;
        }

        @keyframes autofill {
            100% {
                font-size: 1.2em;
                background: transparent;
                color: #FFF;
            }
        }

        @-webkit-keyframes autofill {
            100% {
                font-size: 1.2em;
                background: transparent;
                color: #FFF;
            }
        }

        #hibourContainer {
            width: 100%;
            min-height: 100vh;
            display: flex;
            box-sizing: border-box;
            z-index: 1;
        }

        #hibourContent {
            margin: auto;
            min-width: 220px;
            max-width: 450px;
            padding: 6px;
            box-sizing: border-box;
            overflow: hidden;
            z-index: 999;
        }

        #hibourTitle {
            font-weight: 300;
            color: #434343;
            font-size: 2em;
            margin: 0 0 10px;
            line-height: 35px;
            box-sizing: border-box;
        }

        #hibourContent img {
            width: 200px;
            margin: 0 auto 25px;
            display: block;
        }

        #hibourContent form {
            position: relative;
        }

        #hibourContent form input {
            width: 100%;
            padding: 15px 2px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 0;
            background-color: transparent !important;
            font-size: 1.2em !important;
            color: #FFF;
            transition: all 0.2s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            font-weight: bold !important;
            letter-spacing: 1px !important;
            border-radius: 0;
        }

        #hibourContent form input:focus,
        #hibourContent form input:hover {
            border-bottom: 1px solid rgba(255, 255, 255, 1);
        }

        #hibourContent form button[type="submit"] {
            float: right;
            padding: 6px 0;
            margin: 15px 0 0;
            cursor: pointer;
            box-sizing: border-box;
            border: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            background: none transparent;
            color: #CCC;
            font-size: 1.2em;
            transition: all 0.3s;
            font-weight: bold;
            letter-spacing: 1px;
        }

        #hibourContent form button[type="submit"]:hover {
            border-bottom: 1px solid rgba(255, 255, 255, 1);
        }

        #hibourContent form button[type="submit"]:active {
            color: #FFF;
        }

        .return {
            position: absolute;
            bottom: 10px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            letter-spacing: -0.04em;
            margin: 0;
            text-align: center;
            display: inline-block;
            left: 10px;
        }

        .return a {
            padding-bottom: 1px;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            -webkit-transition: border-color 0.1s ease-in;
            transition: border-color 0.1s ease-in;
        }

        .return a:hover {
            border-bottom-color: #fff;
        }

        #dateContainer{
            text-align: center;
            color: #FFF;
            font-size: 1em;
            line-height: 1.1em;
        }

        #dateContainer span{
            display: block;
        }

        #realHour{
            font-weight: 800;
        }

        @media screen and (max-width: 390px) {
            #hibourContent img {
                width: 100px;
                margin: 0 auto 10px;
            }
        }
    </style>
</head>
<body>
<main>
    <div id="hibourContainer" class="content content--canvas">
        <div id="hibourContent" class="card">
            <div class="card-body">
                <img src="<?= getLogo( APP_IMG_URL . 'appoe-logo-white-sm.png' ); ?>" alt="APPOE">
                <div id="dateContainer"><span id="realHour"><?= date('H : i : s'); ?></span><span><?= displayCompleteDate( date( 'd/m/Y' ) ); ?></span></div>
                <form id="loginForm" action="" method="post">
                    <input type="text" maxlength="70" name="loginInput" id="emailInput"
                           value="<?= ! empty( $_POST['loginInput'] ) ? $_POST['loginInput'] : ''; ?>"
                           required="required" placeholder="<?= trans( 'Login' ); ?>">
                    <input type="password" id="passwordInput" name="passwordInput" required="required"
                           placeholder="<?= trans( 'Mot de passe' ); ?>">
					<?= getFieldsControls(); ?>
                    <span style="color:#FFF;"><?php App\Flash::display(); ?></span>
                    <button type="submit" name="APPOECONNEXION" id="submitButton"><?= trans( 'Connexion' ); ?></button>
                </form>
            </div>
        </div>
    </div>
</main>
<p class="return"><a href="/">Revenir au site</a></p>
<script>

    var realHourContainer = document.getElementById('realHour');
    window.setInterval(function () {
        var d = new Date();
        realHourContainer.innerText = (d.getHours() < 10 ? '0'+d.getHours() : d.getHours()) + ' : ' + (d.getMinutes() < 10 ? '0'+d.getMinutes() : d.getMinutes()) + ' : ' + (d.getSeconds() < 10 ? '0'+d.getSeconds() : d.getSeconds());
    }, 1000);
    if(-1!=navigator.userAgent.indexOf("Chrome")||-1!=navigator.userAgent.indexOf("Firefox")){!function(){"use strict";var e=.5*(Math.sqrt(3)-1),t=(3-Math.sqrt(3))/6,r=1/6,a=(Math.sqrt(5)-1)/4,n=(5-Math.sqrt(5))/20;function i(e){var t;t="function"==typeof e?e:e?function(){var e,t=0,r=0,a=0,n=1,i=(e=4022871197,function(t){t=t.toString();for(var r=0;r<t.length;r++){var a=.02519603282416938*(e+=t.charCodeAt(r));a-=e=a>>>0,e=(a*=e)>>>0,e+=4294967296*(a-=e)}return 2.3283064365386963e-10*(e>>>0)});t=i(" "),r=i(" "),a=i(" ");for(var o=0;o<arguments.length;o++)(t-=i(arguments[o]))<0&&(t+=1),(r-=i(arguments[o]))<0&&(r+=1),(a-=i(arguments[o]))<0&&(a+=1);return i=null,function(){var e=2091639*t+2.3283064365386963e-10*n;return t=r,r=a,a=e-(n=0|e)}}(e):Math.random,this.p=o(t),this.perm=new Uint8Array(512),this.permMod12=new Uint8Array(512);for(var r=0;r<512;r++)this.perm[r]=this.p[255&r],this.permMod12[r]=this.perm[r]%12}function o(e){var t,r=new Uint8Array(256);for(t=0;t<256;t++)r[t]=t;for(t=0;t<255;t++){var a=t+~~(e()*(256-t)),n=r[t];r[t]=r[a],r[a]=n}return r}i.prototype={grad3:new Float32Array([1,1,0,-1,1,0,1,-1,0,-1,-1,0,1,0,1,-1,0,1,1,0,-1,-1,0,-1,0,1,1,0,-1,1,0,1,-1,0,-1,-1]),grad4:new Float32Array([0,1,1,1,0,1,1,-1,0,1,-1,1,0,1,-1,-1,0,-1,1,1,0,-1,1,-1,0,-1,-1,1,0,-1,-1,-1,1,0,1,1,1,0,1,-1,1,0,-1,1,1,0,-1,-1,-1,0,1,1,-1,0,1,-1,-1,0,-1,1,-1,0,-1,-1,1,1,0,1,1,1,0,-1,1,-1,0,1,1,-1,0,-1,-1,1,0,1,-1,1,0,-1,-1,-1,0,1,-1,-1,0,-1,1,1,1,0,1,1,-1,0,1,-1,1,0,1,-1,-1,0,-1,1,1,0,-1,1,-1,0,-1,-1,1,0,-1,-1,-1,0]),noise2D:function(r,a){var n,i,o=this.permMod12,s=this.perm,l=this.grad3,d=0,f=0,h=0,c=(r+a)*e,u=Math.floor(r+c),v=Math.floor(a+c),p=(u+v)*t,w=r-(u-p),b=a-(v-p);w>b?(n=1,i=0):(n=0,i=1);var g=w-n+t,m=b-i+t,M=w-1+2*t,y=b-1+2*t,P=255&u,x=255&v,C=.5-w*w-b*b;if(C>=0){var A=3*o[P+s[x]];d=(C*=C)*C*(l[A]*w+l[A+1]*b)}var S=.5-g*g-m*m;if(S>=0){var q=3*o[P+n+s[x+i]];f=(S*=S)*S*(l[q]*g+l[q+1]*m)}var I=.5-M*M-y*y;if(I>=0){var F=3*o[P+1+s[x+1]];h=(I*=I)*I*(l[F]*M+l[F+1]*y)}return 70*(d+f+h)},noise3D:function(e,t,a){var n,i,o,s,l,d,f,h,c,u,v=this.permMod12,p=this.perm,w=this.grad3,b=(e+t+a)*(1/3),g=Math.floor(e+b),m=Math.floor(t+b),M=Math.floor(a+b),y=(g+m+M)*r,P=e-(g-y),x=t-(m-y),C=a-(M-y);P>=x?x>=C?(l=1,d=0,f=0,h=1,c=1,u=0):P>=C?(l=1,d=0,f=0,h=1,c=0,u=1):(l=0,d=0,f=1,h=1,c=0,u=1):x<C?(l=0,d=0,f=1,h=0,c=1,u=1):P<C?(l=0,d=1,f=0,h=0,c=1,u=1):(l=0,d=1,f=0,h=1,c=1,u=0);var A=P-l+r,S=x-d+r,q=C-f+r,I=P-h+2*r,F=x-c+2*r,O=C-u+2*r,T=P-1+.5,k=x-1+.5,z=C-1+.5,D=255&g,E=255&m,N=255&M,U=.6-P*P-x*x-C*C;if(U<0)n=0;else{var B=3*v[D+p[E+p[N]]];n=(U*=U)*U*(w[B]*P+w[B+1]*x+w[B+2]*C)}var G=.6-A*A-S*S-q*q;if(G<0)i=0;else{var L=3*v[D+l+p[E+d+p[N+f]]];i=(G*=G)*G*(w[L]*A+w[L+1]*S+w[L+2]*q)}var R=.6-I*I-F*F-O*O;if(R<0)o=0;else{var W=3*v[D+h+p[E+c+p[N+u]]];o=(R*=R)*R*(w[W]*I+w[W+1]*F+w[W+2]*O)}var $=.6-T*T-k*k-z*z;if($<0)s=0;else{var H=3*v[D+1+p[E+1+p[N+1]]];s=($*=$)*$*(w[H]*T+w[H+1]*k+w[H+2]*z)}return 32*(n+i+o+s)},noise4D:function(e,t,r,i){var o,s,l,d,f,h,c,u,v,p,w,b,g,m,M,y,P,x=this.perm,C=this.grad4,A=(e+t+r+i)*a,S=Math.floor(e+A),q=Math.floor(t+A),I=Math.floor(r+A),F=Math.floor(i+A),O=(S+q+I+F)*n,T=e-(S-O),k=t-(q-O),z=r-(I-O),D=i-(F-O),E=0,N=0,U=0,B=0;T>k?E++:N++,T>z?E++:U++,T>D?E++:B++,k>z?N++:U++,k>D?N++:B++,z>D?U++:B++;var G=T-(h=E>=3?1:0)+n,L=k-(c=N>=3?1:0)+n,R=z-(u=U>=3?1:0)+n,W=D-(v=B>=3?1:0)+n,$=T-(p=E>=2?1:0)+2*n,H=k-(w=N>=2?1:0)+2*n,_=z-(b=U>=2?1:0)+2*n,j=D-(g=B>=2?1:0)+2*n,J=T-(m=E>=1?1:0)+3*n,K=k-(M=N>=1?1:0)+3*n,Q=z-(y=U>=1?1:0)+3*n,V=D-(P=B>=1?1:0)+3*n,X=T-1+4*n,Y=k-1+4*n,Z=z-1+4*n,ee=D-1+4*n,te=255&S,re=255&q,ae=255&I,ne=255&F,ie=.6-T*T-k*k-z*z-D*D;if(ie<0)o=0;else{var oe=x[te+x[re+x[ae+x[ne]]]]%32*4;o=(ie*=ie)*ie*(C[oe]*T+C[oe+1]*k+C[oe+2]*z+C[oe+3]*D)}var se=.6-G*G-L*L-R*R-W*W;if(se<0)s=0;else{var le=x[te+h+x[re+c+x[ae+u+x[ne+v]]]]%32*4;s=(se*=se)*se*(C[le]*G+C[le+1]*L+C[le+2]*R+C[le+3]*W)}var de=.6-$*$-H*H-_*_-j*j;if(de<0)l=0;else{var fe=x[te+p+x[re+w+x[ae+b+x[ne+g]]]]%32*4;l=(de*=de)*de*(C[fe]*$+C[fe+1]*H+C[fe+2]*_+C[fe+3]*j)}var he=.6-J*J-K*K-Q*Q-V*V;if(he<0)d=0;else{var ce=x[te+m+x[re+M+x[ae+y+x[ne+P]]]]%32*4;d=(he*=he)*he*(C[ce]*J+C[ce+1]*K+C[ce+2]*Q+C[ce+3]*V)}var ue=.6-X*X-Y*Y-Z*Z-ee*ee;if(ue<0)f=0;else{var ve=x[te+1+x[re+1+x[ae+1+x[ne+1]]]]%32*4;f=(ue*=ue)*ue*(C[ve]*X+C[ve+1]*Y+C[ve+2]*Z+C[ve+3]*ee)}return 27*(o+s+l+d+f)}},i._buildPermutationTable=o,"undefined"!=typeof define&&define.amd&&define(function(){return i}),"undefined"!=typeof exports?exports.SimplexNoise=i:"undefined"!=typeof window&&(window.SimplexNoise=i),"undefined"!=typeof module&&(module.exports=i)}();const{PI:e,cos:t,sin:r,abs:a,sqrt:n,pow:i,round:o,random:s,atan2:l}=Math,d=2*e,f=e=>e*s(),h=e=>e-f(2*e),c=(e,t)=>{let r=.5*t;return a((e+r)%t-r)/r},u=(e,t,r)=>(1-r)*e+r*t,v=9,p=700*v,w=100,b=50,g=150,m=.1,M=2,y=1,P=4,x=220,C=100,A=8,S=.00125,q=.00125,I=5e-4,F="hsla(260,40%,5%,1)";let O,T,k,z,D,E,N;function setup(){createCanvas(),resize(),initParticles(),draw()}function initParticles(){let e;for(D=0,E=new SimplexNoise,N=new Float32Array(p),e=0;e<p;e+=v)initParticle(e)}function initParticle(e){let t,r,a,n,i,o,s,l,d;t=f(T.a.width),r=z[1]+h(w),a=0,n=0,i=0,o=b+f(g),s=m+f(M),l=y+f(P),d=x+f(C),N.set([t,r,0,0,0,o,s,l,d],e)}function drawParticles(){let e;for(e=0;e<p;e+=v)updateParticle(e)}function updateParticle(e){let a,n,i,o,s,l,f,h,c,v,p,w,b=1+e,g=2+e,m=3+e,M=4+e,y=5+e,P=6+e,x=7+e,C=8+e;n=N[e],i=N[b],a=E.noise3D(n*S,i*q,D*I)*A*d,o=u(N[g],t(a),.5),s=u(N[m],r(a),.5),l=N[M],f=N[y],drawParticle(n,i,c=n+o*(h=N[P]),v=i+s*h,l,f,p=N[x],w=N[C]),l++,N[e]=c,N[b]=v,N[g]=o,N[m]=s,N[M]=l,(checkBounds(n,i)||l>f)&&initParticle(e)}function drawParticle(e,t,r,a,n,i,o,s){k.a.save(),k.a.lineCap="round",k.a.lineWidth=o,k.a.strokeStyle=`hsla(${s},100%,60%,${c(n,i)})`,k.a.beginPath(),k.a.moveTo(e,t),k.a.lineTo(r,a),k.a.stroke(),k.a.closePath(),k.a.restore()}function checkBounds(e,t){return e>T.a.width||e<0||t>T.a.height||t<0}function createCanvas(){O=document.querySelector(".content--canvas"),(T={a:document.createElement("canvas"),b:document.createElement("canvas")}).b.style="\n\t\tposition: fixed;\n\t\ttop: 0;\n\t\tleft: 0;\n\t\twidth: 100%;\n\t\theight: 100%;\n\t",O.appendChild(T.b),k={a:T.a.getContext("2d"),b:T.b.getContext("2d")},z=[]}function resize(){const{innerWidth:e,innerHeight:t}=window;T.a.width=e,T.a.height=t,k.a.drawImage(T.b,0,0),T.b.width=e,T.b.height=t,k.b.drawImage(T.a,0,0),z[0]=.5*T.a.width,z[1]=.5*T.a.height}function renderGlow(){k.b.save(),k.b.filter="blur(8px) brightness(200%)",k.b.globalCompositeOperation="lighter",k.b.drawImage(T.a,0,0),k.b.restore(),k.b.save(),k.b.filter="blur(4px) brightness(200%)",k.b.globalCompositeOperation="lighter",k.b.drawImage(T.a,0,0),k.b.restore()}function renderToScreen(){k.b.save(),k.b.globalCompositeOperation="lighter",k.b.drawImage(T.a,0,0),k.b.restore()}function draw(){D++,k.a.clearRect(0,0,T.a.width,T.a.height),k.b.fillStyle=F,k.b.fillRect(0,0,T.a.width,T.a.height),drawParticles(),renderGlow(),renderToScreen(),window.requestAnimationFrame(draw)}window.addEventListener("load",setup),window.addEventListener("resize",resize)}
</script>
</body>
</html>