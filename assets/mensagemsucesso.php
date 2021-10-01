<?php echo'
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<div id="fundoescuro"></div>

<div id="blackback">
    <div class="container" id="msgbx">
        <div class="row">
            <div class="mx-auto mt-5 div4">
                <div class="payment">
                    <div class="payment_header">
                    <lottie-player src="https://assets6.lottiefiles.com/temp/lf20_5tgmik.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"    autoplay></lottie-player>               
                    </div>
                    <div class="content">
                    <h1>Compra Concluída!</h1>
                    <p>Sua compra foi efetuada com sucesso.</p>
                    <a href="?">CONCLUIR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">

    body
    {
        background:#f2f2f2;
        overflow-y: hidden;
    }

    header
    {
        animation: none;
    }

    #fundoescuro
    {
        height: 100vh;
        width: 100vw;
        filter: opacity(80%);
        z-index: 3;
        position: fixed;
        backdrop-filter: brightness(0.5);
    }

    .payment
	{
        border: 1px solid #f2f2f2;
        height: 340px;
        width: 500px;
        border-radius: 20px;
        background: #fff;
	}
   .payment_header
   {
        align-items: center;
        background: #b9b9b95e;
        padding: 20px;
        border-radius: 20px 20px 0px 0px;
        display: flex;
        justify-content: center;
   }
   
   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }
   
   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content 
    {
        text-align:center;
    }

    .content  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content a
    {
        text-decoration: none;
        width:200px;
        height:35px;
        color:#fff;
        border-radius:8px;
        padding: 10px 25px;
        background:#478d6d;
        transition:all ease-in-out 0.3s;
    }

    .content a:hover
    {
        text-decoration:none;
        background:#000;
    }

    #msgbx
    {
        position: fixed;
        z-index: 3;
    }

    #msgbx p
    {
        margin-bottom: 50px;
    }

    #blackback
    {
        display:flex;
        justify-content:center;
        width:100%;
        height:auto;
    }

    .div4
    {
        display:flex;
        justify-content:center;
    }
   
</style>';

?>