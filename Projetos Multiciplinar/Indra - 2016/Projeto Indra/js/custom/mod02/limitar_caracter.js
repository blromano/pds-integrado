<inpyt type="text" onkeyup="limitarInput(this)" /> 

<script>
  function limitarInput(obj) {
    obj.value = obj.value.substring(0,6);
  }
</script>