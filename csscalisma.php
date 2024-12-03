<div class="divi">
    <img class="img" src="img/profiles/profilegirl.jpg" alt="">
    <div class="icdiv">
        <p class="psi">Yağ-Gross</p>
    </div>
</div>
<div class="yenikart">
    <img class="imgman" src="img/profiles/profileman.jpg" alt="" srcset="">
</div>

<style>
    body {
        background-color: #111; /* Arka plan rengi */
        justify-content: center;
    }
    .divi {
        width: 200px;
        height: 200px;
        background-color: red;
        border-radius: 5%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        float: left;
    }
    .psi {
        font-size: 20px;
        color: #fff; /* Metin rengi */
        text-align: center;
        margin: auto;
    }
    .icdiv {
        width: 200px;
        height: 200px;
        background-color: #324545; /* İç div arka plan rengi */
        margin-left: 300px;
        border-radius: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        margin-left: 450px;
        /* bottom: 10px; İsteğe bağlı olarak iç divi altta hizalayın */
    }
    .img {
        width: 150px;
        border-radius: 50%;
    }
    .yenikart {
        background-color: #14ffff;
        width: 400px;
        height: 200px;
        border-radius: 25px;
        margin: auto;
        margin-left: 450px;
        position: absolute;
        display: flex;
    }
    .imgman {
        width: 150px;
        border-radius: 50% 50% 50% 50% ;
        margin: auto;
        margin-left: 20px;
        animation-name: pr;
        animation-duration: 2s;
    }
    .imgman:hover {
        animation-name: prh;
        animation-duration: 2s;
    }
    @keyframes prh {
        0% {border-radius: 0 50% 0 50%;}
    }
    @keyframes prnull {
        /* 0% {transform: rotate(0deg);}
        25% {transform: rotate(90deg);}
        50% {transform: rotate(180deg);}
        100% {transform:rotate(360deg);} */
        0% {
            border-radius: 50% 50% 50% 50%;
        }
    }
</style>
