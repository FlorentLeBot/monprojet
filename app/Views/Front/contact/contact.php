<!-- le formulaire de contact -->
<section class="form-contact">
    <form id="form-contact" class="" action="/monprojet/contact" method="POST">
        <fieldset>
            <legend>Laissez-nous un message</legend>

            <p>
                <label for="firstname">Entrez votre prénom </label>
                <input type="text" id="firstname" name="firstname" placeholder="prénom">
            </p>

            <p>
                <label for="lastname">Entrez votre nom </label>
                <input type="text" id="lastname" name="lastname" placeholder="nom">
            </p>

            <p>
                <label for="email">Entrez votre email </label>
                <input type="email" id="email" name="email" placeholder="email">
            </p>

            <p>
                <label for="message">Entrez votre message </label>
                <textarea name="content" id="message" cols="20" rows="6" placeholder="Message"></textarea>
            </p>

            <p>
                <input type="checkbox" id="accept" name="accept">J'accepte les conditions générales
                d'utilisation</input>
            </p>

            <p><button class="btn" type="submit">Envoyer</button></p>

        </fieldset>
    </form>
</section>