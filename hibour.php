<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/main.php');
includePluginsFiles();
require_once(WEB_SYSTEM_PATH . 'auth_user.php');
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
                font-size:1.2em;
                background: transparent;
                color: #FFF;
            }
        }

        @-webkit-keyframes autofill {
            100% {
                font-size:1.2em;
                background: transparent;
                color: #FFF;
            }
        }

        .return {
            position: absolute;
            width: 100%;
            bottom: 30px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            letter-spacing: -0.04em;
            margin: 0;
            text-align: center;
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
    </style>
</head>
<body>
<main>
    <div id="hibourContainer" class="content content--canvas">
        <div id="hibourContent" class="card">
            <div class="card-body">
                <img src="<?= getLogo(APP_IMG_URL . 'appoe-logo-white-sm.png'); ?>" alt="APPOE">
                <form id="loginForm" action="" method="post">
                    <input type="text" maxlength="70" name="loginInput" id="emailInput"
                           value="<?= !empty($_POST['loginInput']) ? $_POST['loginInput'] : ''; ?>"
                           required="required" placeholder="<?= trans('Login'); ?>">
                    <input type="password" id="passwordInput" name="passwordInput" required="required"
                           placeholder="<?= trans('Mot de passe'); ?>">
                    <?= getFieldsControls(); ?>
                    <span style="color:#FFF;"><?php App\Flash::display(); ?></span>
                    <button type="submit" name="APPOECONNEXION" id="submitButton"><?= trans('Connexion'); ?></button>
                </form>
            </div>
        </div>
    </div>
</main>
<p class="return"><a href="/">Revenir au site</a></p>
<script>
    !function(){"use strict";var e=.5*(Math.sqrt(3)-1),a=(3-Math.sqrt(3))/6,t=1/6,r=(Math.sqrt(5)-1)/4,n=(5-Math.sqrt(5))/20;function i(e){var a;a="function"==typeof e?e:e?function(){var e,a=0,t=0,r=0,n=1,i=(e=4022871197,function(a){a=a.toString();for(var t=0;t<a.length;t++){var r=.02519603282416938*(e+=a.charCodeAt(t));r-=e=r>>>0,e=(r*=e)>>>0,e+=4294967296*(r-=e)}return 2.3283064365386963e-10*(e>>>0)});a=i(" "),t=i(" "),r=i(" ");for(var o=0;o<arguments.length;o++)(a-=i(arguments[o]))<0&&(a+=1),(t-=i(arguments[o]))<0&&(t+=1),(r-=i(arguments[o]))<0&&(r+=1);return i=null,function(){var e=2091639*a+2.3283064365386963e-10*n;return a=t,t=r,r=e-(n=0|e)}}(e):Math.random,this.p=o(a),this.perm=new Uint8Array(512),this.permMod12=new Uint8Array(512);for(var t=0;t<512;t++)this.perm[t]=this.p[255&t],this.permMod12[t]=this.perm[t]%12}function o(e){var a,t=new Uint8Array(256);for(a=0;a<256;a++)t[a]=a;for(a=0;a<255;a++){var r=a+~~(e()*(256-a)),n=t[a];t[a]=t[r],t[r]=n}return t}i.prototype={grad3:new Float32Array([1,1,0,-1,1,0,1,-1,0,-1,-1,0,1,0,1,-1,0,1,1,0,-1,-1,0,-1,0,1,1,0,-1,1,0,1,-1,0,-1,-1]),grad4:new Float32Array([0,1,1,1,0,1,1,-1,0,1,-1,1,0,1,-1,-1,0,-1,1,1,0,-1,1,-1,0,-1,-1,1,0,-1,-1,-1,1,0,1,1,1,0,1,-1,1,0,-1,1,1,0,-1,-1,-1,0,1,1,-1,0,1,-1,-1,0,-1,1,-1,0,-1,-1,1,1,0,1,1,1,0,-1,1,-1,0,1,1,-1,0,-1,-1,1,0,1,-1,1,0,-1,-1,-1,0,1,-1,-1,0,-1,1,1,1,0,1,1,-1,0,1,-1,1,0,1,-1,-1,0,-1,1,1,0,-1,1,-1,0,-1,-1,1,0,-1,-1,-1,0]),noise2D:function(t,r){var n,i,o=this.permMod12,s=this.perm,c=this.grad3,l=0,p=0,d=0,f=(t+r)*e,u=Math.floor(t+f),h=Math.floor(r+f),v=(u+h)*a,g=t-(u-v),b=r-(h-v);g>b?(n=1,i=0):(n=0,i=1);var x=g-n+a,w=b-i+a,P=g-1+2*a,m=b-1+2*a,M=255&u,y=255&h,C=.5-g*g-b*b;if(C>=0){var S=3*o[M+s[y]];l=(C*=C)*C*(c[S]*g+c[S+1]*b)}var T=.5-x*x-w*w;if(T>=0){var I=3*o[M+n+s[y+i]];p=(T*=T)*T*(c[I]*x+c[I+1]*w)}var O=.5-P*P-m*m;if(O>=0){var A=3*o[M+1+s[y+1]];d=(O*=O)*O*(c[A]*P+c[A+1]*m)}return 70*(l+p+d)},noise3D:function(e,a,r){var n,i,o,s,c,l,p,d,f,u,h=this.permMod12,v=this.perm,g=this.grad3,b=(e+a+r)*(1/3),x=Math.floor(e+b),w=Math.floor(a+b),P=Math.floor(r+b),m=(x+w+P)*t,M=e-(x-m),y=a-(w-m),C=r-(P-m);M>=y?y>=C?(c=1,l=0,p=0,d=1,f=1,u=0):M>=C?(c=1,l=0,p=0,d=1,f=0,u=1):(c=0,l=0,p=1,d=1,f=0,u=1):y<C?(c=0,l=0,p=1,d=0,f=1,u=1):M<C?(c=0,l=1,p=0,d=0,f=1,u=1):(c=0,l=1,p=0,d=1,f=1,u=0);var S=M-c+t,T=y-l+t,I=C-p+t,O=M-d+2*t,A=y-f+2*t,L=C-u+2*t,k=M-1+.5,q=y-1+.5,R=C-1+.5,z=255&x,H=255&w,D=255&P,F=.6-M*M-y*y-C*C;if(F<0)n=0;else{var U=3*h[z+v[H+v[D]]];n=(F*=F)*F*(g[U]*M+g[U+1]*y+g[U+2]*C)}var E=.6-S*S-T*T-I*I;if(E<0)i=0;else{var N=3*h[z+c+v[H+l+v[D+p]]];i=(E*=E)*E*(g[N]*S+g[N+1]*T+g[N+2]*I)}var _=.6-O*O-A*A-L*L;if(_<0)o=0;else{var B=3*h[z+d+v[H+f+v[D+u]]];o=(_*=_)*_*(g[B]*O+g[B+1]*A+g[B+2]*L)}var G=.6-k*k-q*q-R*R;if(G<0)s=0;else{var W=3*h[z+1+v[H+1+v[D+1]]];s=(G*=G)*G*(g[W]*k+g[W+1]*q+g[W+2]*R)}return 32*(n+i+o+s)},noise4D:function(e,a,t,i){var o,s,c,l,p,d,f,u,h,v,g,b,x,w,P,m,M,y=this.perm,C=this.grad4,S=(e+a+t+i)*r,T=Math.floor(e+S),I=Math.floor(a+S),O=Math.floor(t+S),A=Math.floor(i+S),L=(T+I+O+A)*n,k=e-(T-L),q=a-(I-L),R=t-(O-L),z=i-(A-L),H=0,D=0,F=0,U=0;k>q?H++:D++,k>R?H++:F++,k>z?H++:U++,q>R?D++:F++,q>z?D++:U++,R>z?F++:U++;var E=k-(d=H>=3?1:0)+n,N=q-(f=D>=3?1:0)+n,_=R-(u=F>=3?1:0)+n,B=z-(h=U>=3?1:0)+n,G=k-(v=H>=2?1:0)+2*n,W=q-(g=D>=2?1:0)+2*n,Y=R-(b=F>=2?1:0)+2*n,$=z-(x=U>=2?1:0)+2*n,j=k-(w=H>=1?1:0)+3*n,J=q-(P=D>=1?1:0)+3*n,K=R-(m=F>=1?1:0)+3*n,Q=z-(M=U>=1?1:0)+3*n,V=k-1+4*n,X=q-1+4*n,Z=R-1+4*n,ee=z-1+4*n,ae=255&T,te=255&I,re=255&O,ne=255&A,ie=.6-k*k-q*q-R*R-z*z;if(ie<0)o=0;else{var oe=y[ae+y[te+y[re+y[ne]]]]%32*4;o=(ie*=ie)*ie*(C[oe]*k+C[oe+1]*q+C[oe+2]*R+C[oe+3]*z)}var se=.6-E*E-N*N-_*_-B*B;if(se<0)s=0;else{var ce=y[ae+d+y[te+f+y[re+u+y[ne+h]]]]%32*4;s=(se*=se)*se*(C[ce]*E+C[ce+1]*N+C[ce+2]*_+C[ce+3]*B)}var le=.6-G*G-W*W-Y*Y-$*$;if(le<0)c=0;else{var pe=y[ae+v+y[te+g+y[re+b+y[ne+x]]]]%32*4;c=(le*=le)*le*(C[pe]*G+C[pe+1]*W+C[pe+2]*Y+C[pe+3]*$)}var de=.6-j*j-J*J-K*K-Q*Q;if(de<0)l=0;else{var fe=y[ae+w+y[te+P+y[re+m+y[ne+M]]]]%32*4;l=(de*=de)*de*(C[fe]*j+C[fe+1]*J+C[fe+2]*K+C[fe+3]*Q)}var ue=.6-V*V-X*X-Z*Z-ee*ee;if(ue<0)p=0;else{var he=y[ae+1+y[te+1+y[re+1+y[ne+1]]]]%32*4;p=(ue*=ue)*ue*(C[he]*V+C[he+1]*X+C[he+2]*Z+C[he+3]*ee)}return 27*(o+s+c+l+p)}},i._buildPermutationTable=o,"undefined"!=typeof define&&define.amd&&define(function(){return i}),"undefined"!=typeof exports?exports.SimplexNoise=i:"undefined"!=typeof window&&(window.SimplexNoise=i),"undefined"!=typeof module&&(module.exports=i)}();const{PI:PI,cos:cos,sin:sin,abs:abs,sqrt:sqrt,pow:pow,round:round,random:random,atan2:atan2}=Math,HALF_PI=.5*PI,TAU=2*PI,TO_RAD=PI/180,floor=e=>0|e,rand=e=>e*random(),randIn=(e,a)=>rand(a-e)+e,randRange=e=>e-rand(2*e),fadeIn=(e,a)=>e/a,fadeOut=(e,a)=>(a-e)/a,fadeInOut=(e,a)=>{let t=.5*a;return abs((e+t)%a-t)/t},dist=(e,a,t,r)=>sqrt(pow(t-e,2)+pow(r-a,2)),angle=(e,a,t,r)=>atan2(r-a,t-e),lerp=(e,a,t)=>(1-t)*e+t*a,particleCount=700,particlePropCount=9,particlePropsLength=700*particlePropCount,rangeY=100,baseTTL=50,rangeTTL=150,baseSpeed=.1,rangeSpeed=2,baseRadius=1,rangeRadius=4,baseHue=220,rangeHue=100,noiseSteps=8,xOff=.00125,yOff=.00125,zOff=5e-4,backgroundColor="hsla(260,40%,5%,1)";let container,canvas,ctx,center,gradient,tick,simplex,particleProps,positions,velocities,lifeSpans,speeds,sizes,hues;function setup(){createCanvas(),resize(),initParticles(),draw()}function initParticles(){let e;for(tick=0,simplex=new SimplexNoise,particleProps=new Float32Array(particlePropsLength),e=0;e<particlePropsLength;e+=particlePropCount)initParticle(e)}function initParticle(e){let a,t,r,n,i,o,s,c,l;a=rand(canvas.a.width),t=center[1]+randRange(rangeY),r=0,n=0,i=0,o=baseTTL+rand(rangeTTL),s=baseSpeed+rand(rangeSpeed),c=baseRadius+rand(rangeRadius),l=baseHue+rand(rangeHue),particleProps.set([a,t,0,0,0,o,s,c,l],e)}function drawParticles(){let e;for(e=0;e<particlePropsLength;e+=particlePropCount)updateParticle(e)}function updateParticle(e){let a,t,r,n,i,o,s,c,l,p,d,f,u=1+e,h=2+e,v=3+e,g=4+e,b=5+e,x=6+e,w=7+e,P=8+e;t=particleProps[e],r=particleProps[u],a=simplex.noise3D(t*xOff,r*yOff,tick*zOff)*noiseSteps*TAU,n=lerp(particleProps[h],cos(a),.5),i=lerp(particleProps[v],sin(a),.5),o=particleProps[g],s=particleProps[b],drawParticle(t,r,l=t+n*(c=particleProps[x]),p=r+i*c,o,s,d=particleProps[w],f=particleProps[P]),o++,particleProps[e]=l,particleProps[u]=p,particleProps[h]=n,particleProps[v]=i,particleProps[g]=o,(checkBounds(t,r)||o>s)&&initParticle(e)}function drawParticle(e,a,t,r,n,i,o,s){ctx.a.save(),ctx.a.lineCap="round",ctx.a.lineWidth=o,ctx.a.strokeStyle=`hsla(${s},100%,60%,${fadeInOut(n,i)})`,ctx.a.beginPath(),ctx.a.moveTo(e,a),ctx.a.lineTo(t,r),ctx.a.stroke(),ctx.a.closePath(),ctx.a.restore()}function checkBounds(e,a){return e>canvas.a.width||e<0||a>canvas.a.height||a<0}function createCanvas(){container=document.querySelector(".content--canvas"),(canvas={a:document.createElement("canvas"),b:document.createElement("canvas")}).b.style="\n\t\tposition: fixed;\n\t\ttop: 0;\n\t\tleft: 0;\n\t\twidth: 100%;\n\t\theight: 100%;\n\t",container.appendChild(canvas.b),ctx={a:canvas.a.getContext("2d"),b:canvas.b.getContext("2d")},center=[]}function resize(){const{innerWidth:e,innerHeight:a}=window;canvas.a.width=e,canvas.a.height=a,ctx.a.drawImage(canvas.b,0,0),canvas.b.width=e,canvas.b.height=a,ctx.b.drawImage(canvas.a,0,0),center[0]=.5*canvas.a.width,center[1]=.5*canvas.a.height}function renderGlow(){ctx.b.save(),ctx.b.filter="blur(8px) brightness(200%)",ctx.b.globalCompositeOperation="lighter",ctx.b.drawImage(canvas.a,0,0),ctx.b.restore(),ctx.b.save(),ctx.b.filter="blur(4px) brightness(200%)",ctx.b.globalCompositeOperation="lighter",ctx.b.drawImage(canvas.a,0,0),ctx.b.restore()}function renderToScreen(){ctx.b.save(),ctx.b.globalCompositeOperation="lighter",ctx.b.drawImage(canvas.a,0,0),ctx.b.restore()}function draw(){tick++,ctx.a.clearRect(0,0,canvas.a.width,canvas.a.height),ctx.b.fillStyle=backgroundColor,ctx.b.fillRect(0,0,canvas.a.width,canvas.a.height),drawParticles(),renderGlow(),renderToScreen(),window.requestAnimationFrame(draw)}window.addEventListener("load",setup),window.addEventListener("resize",resize);
</script>
</body>
</html>