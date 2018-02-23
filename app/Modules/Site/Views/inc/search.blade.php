<form novalidate="novalidate" class="searchbox sbx-custom" action="{{ url('search') }}">

{{ csrf_field() }}

  <div role="search" class="sbx-custom__wrapper">
    <input type="search" name="search" placeholder="Search Videos" autocomplete="off" required="required" class="sbx-custom__input">
    <button type="submit" title="Submit" class="sbx-custom__submit">
      <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
    </button>
    <button type="reset" title="Clear the search query." class="sbx-custom__reset">
      <span class="mbri-close mbr-iconfont mbr-iconfont-btn"></span>
    </button>
  </div>
</form>
<script type="text/javascript">
  document.querySelector('.searchbox [type="reset"]').addEventListener('click', function() {  this.parentNode.querySelector('input').focus();});
</script>