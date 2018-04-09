<footer class="bigfoot bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-lg" id="footer-navigation">
        <ul class="nav justify-content-left hidden-md-down">
          <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item "><a class="nav-link" href="#">Legal</a></li>
        </ul>
        <ul class="nav justify-content-center hidden-xs-down hidden-lg-up">
          <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item "><a class="nav-link" href="#">Legal</a></li>
        </ul>
        <ul class="nav flex-column hidden-sm-up text-center">
          <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item "><a class="nav-link" href="#">Legal</a></li>
        </ul>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <hr/>
    <div class="row" id="footer-copyright">
      <div class="col-lg" id="footer-social">
        <ul class="list-inline">
        <li class="list-inline-item">
          <a title="Twitter" href="#"><i class="fab fa-twitter fa-2x"></i></a>
        </li>
        <li class="list-inline-item">
          <a title="Facebook" href="#"><i class="fab fa-facebook fa-2x"></i></a>
        </li>
        <li class="list-inline-item">
          <a title="JSON Feed" href="{{ url('auctions-feed') }}"><i class="fas fa-rss-square fa-2x"></i></a>
        </li>
        </ul>
      </div><!-- /.col -->
      <div class="col-lg" id="copyright-owner">
        <p>Copyright &copy; 2018 {{ config('app.name', 'Laravel') }}. Tots els drets reservats.</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-lg" id="copyright-designer">
        <hr>
        <p><small>Dissenyat per Joan Navarro, Enric Beltran i Roger Forner</small>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</footer>
