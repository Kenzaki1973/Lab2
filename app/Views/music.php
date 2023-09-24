<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>/css/style.css">
</head>
<body>
  <div class="modal fade" id="PlaylistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Playlists</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <br>
          <?php if(isset($plays)): ?>
              <?php foreach($plays as $p): ?>
                  <a href="/selectedplaylist/<?= $p['playlistname']; ?>" class="btn btn-primary" style="text-decoration: none;"><?= $p['playlistname']; ?></a>
                  <a href="/deleteplaylist/<?= $p['id']; ?>" class="hover-effect">
                      <img src="<?= base_url(); ?>/delete.png">
                  </a>
              <br><br>
              <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal" class="btn btn-secondary"style="text-decoration: none;">Close</a>
          <a href="#" data-bs-toggle="modal" data-bs-target="#createPlaylistModal" class="btn btn-primary"style="text-decoration: none;">Create New Playlist</a>
        </div>
      </div>
    </div>
  </div>
<!-- Modal for song addition form -->
  <div class="modal fade" id="SongModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Upload a Song:</h3>
        </div>
          <!--INPUT FILE -->
          <form action="/addsong" method="post" enctype="multipart/form-data">
            <label for="myfile">Select file:</label>
            <input type="file" id="myfile" name="myfile" accept=".mp3">
            <input type="submit" value="Upload"><br>
          </form>
          <div class="modal-footer">
          <a href="#" data-bs-dismiss="modal" class="btn btn-secondary"style="text-decoration: none;">Close</a>
        </div>
      </div>
    </div>
  </div>
<!-- Modal for playlist creation form -->
<div class="modal fade" id="createPlaylistModal" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPlaylistModalLabel">Create New Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Add your form here -->
                <form action="/createplaylist" method="post">
                    <div class="mb-3">
                        <label for="playlistName" class="form-label">Playlist Name</label>
                        <input type="text" class="form-control" id="playlistName" name="playlistName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
  <form action="/searchsong" method="get">
    <input type="search" name="search" placeholder="Search a Song">
    <button type="submit" class="btn btn-primary">Search</button>
</form><br>

    <h1>Music Player</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PlaylistModal">My Playlist</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SongModal">Add Song</button><br><br><br>

    <audio id="audio" controls autoplay></audio>
    <br><h1>Current Playlist : <?= session()->get('selected_playlist', 'Default Playlist'); ?></h1><br><br>
    <ul id="playlist">
    <?php if ($mus): ?>
            <?php foreach ($mus as $music): ?>
                <li data-src="<?= base_url(); ?>/music/<?= $music['musicname'];?>.mp3"><?= $music['musicname']; ?>
                  <a href="/addtoplaylist" class="hover-effect">
                      <img src="<?= base_url(); ?>/add.png">
                  </a>
                </li>
            <?php endforeach; ?>
    <?php else: ?>
        <?php foreach ($music as $m): ?>
          <li data-src="<?= base_url(); ?>/music/<?= $m['musicname'];?>.mp3"><?= $m['musicname']; ?>
          <a href="/addmusictoplaylist/<?= $m['id']; ?>" class="hover-effect">
              <img src="<?= base_url(); ?>/add.png">
          </a></li>
        <?php endforeach; ?>
    <?php endif; ?>
    </ul>

    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Select from playlist</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
          <form action="/" method="post">
            <p id="modalData"></p>
            <input type="hidden" id="musicID" name="musicID">
            <select  name="playlist" class="form-control" >
              <option value="playlist">playlist</option>
            </select>
            <input type="submit" name="add">
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script src="<?= base_url(); ?>/js/script.js"></script>
</body>
</html>
