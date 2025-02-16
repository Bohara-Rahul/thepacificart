<main>
    <h2>Congratulations, {{ $artist->name }}!</h2>
    <p>Your application to become a seller on Pacific Art Marketplace has been approved.</p>
    <p>You can now log in and start uploading your artworks.</p>
    <p><a href="{{ url('/login') }}">Click here to log in</a></p>
    <p>Best Regards,<br>Pacific Art Team</p>
</main>
