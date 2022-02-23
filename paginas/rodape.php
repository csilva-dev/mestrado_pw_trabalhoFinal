</main>
<footer class="text-center text-white" style="background-color: #00203F">
    <div class="container p-4">    
        <section class="mb-4">
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.facebook.pt" target="_blank" role="button"><i class="bi bi-facebook"></i></a>    
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.messenger.com" target="_blank" role="button"><i class="bi bi-messenger"></i></a>    
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.whatsapp.com" target="_blank" role="button"><i class="bi bi-whatsapp"></i></a>    
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.instagram.com" target="_blank" role="button"><i class="bi bi-instagram"></i></a>    
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.linkedin.com/" target="_blank" role="button"><i class="bi bi-linkedin"></i></a>    
            <a class="btn btn-outline-light btn-floating m-1" href="http://www.snapchat.com" target="_blank" role="button"><i class="bi bi-snapchat"></i></a>
        </section>

        <section class="">
            <form action="php/actions/newsletter.php" method="POST">
                <div class="row d-flex justify-content-center">
                    <p>Fique a par de todas as nossas novidades.</p>
                    <p>Subscreva a nossa newsletter!</p>
                    <div class="col-md-5 col-12">
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="form5Example21" class="form-control" placeholder="Insira o seu email" name="email" />                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-light mb-4">Subscrever</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © <?php echo date("Y"); ?> Copyright: Boa-Comida, Lda
    </div>
</footer>
</body>
</html>