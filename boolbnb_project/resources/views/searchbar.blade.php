
<div class="search-section">
  <form action="/search" method="POST" role="search">
      {{ csrf_field() }}
      <div class="searchbar">
          <input id="query" type="text" class="form-control" name="q"
              placeholder="Dove vuoi andare?">
          <input id='lat' type="text" name="lat" value="">
          <input id='long' type="text" name="long" value=""><br>

      </div>
      <div class="botton">
        <button type="submit" class="btn btn-default">
          CERCA
        </button>
      </div>
  </form>
</div>
