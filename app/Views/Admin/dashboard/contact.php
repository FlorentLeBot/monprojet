<h2 class="main-title">Les messages</h2>

<div class="table">
    <h3 class="table-title">Utilisateur</h3>
    <h3 class="table-title">Email</h3>
    <h3 class="table-title">Message</h3>
    <h3 class="table-title">Action</h3>
</div>

<?php foreach ($params['contact'] as $contact) : ?>


<div class="table-results">
    <ul class="table-item">
        <li class="contact-id"><?= $contact->firstname . " " . $contact->lastname ?></li>
        <li class="contact-title"><?= $contact->email ?></li>
        <li class="contact-created-at"><?= $contact->content ?></li>
        <li>
            <form action="/monprojet/admin/contact/delete/<?= $contact->id ?>" method="post">
                <button type="submit">Supprimer</button>
            </form>
        </li>
    </ul>
</div>

<?php endforeach ?>