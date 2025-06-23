<h2>All Stories</h2>

<?php foreach ($stories as $story): ?>
    <div>
        <h3><?= htmlspecialchars($story['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars(substr($story['body'], 0, 150))) ?>...</p>
        <hr>
    </div>
<?php endforeach; ?>
