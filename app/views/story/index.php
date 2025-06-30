<h2>All Stories</h2>

<h2>Submit a New Story</h2>

<form method="post" action="<?= BASE_URL ?>/story/store">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Body:</label><br>
    <textarea name="body" rows="10" cols="60" required></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<p><a href="<?= BASE_URL ?>/story">← Back to all stories</a></p>


<?php foreach ($stories as $story): ?>
    <div>
        <h3><?= htmlspecialchars($story['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars(substr($story['body'], 0, 150))) ?>...</p>
        <hr>
    </div>
<?php endforeach; ?>
