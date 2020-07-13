<div class="search-h-bar">


<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input id="query" type="text" class="form-control" name="q"
            placeholder="Search users">
        <input id='lat' type="text" name="lat" value="">
        <input id='long' type="text" name="long" value="">
            <button type="submit" class="btn btn-default">
                CERCA
            </button>
        </span>
    </div>
</form>
</div>

<p>fdsa</p>
