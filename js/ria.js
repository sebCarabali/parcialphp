$(window).load(function() {
  $("#dependencia").change(evt => {
    var value = evt.target.value;
    if (value !== "0") {
      $.ajax({
        url: "subdependencia.php?i=" + value,
        method: "GET"
      }).done(function(data) {
        var htmlcontent =
          '<option value="0">-- Seleccionar subdependencias </option>';
        data = JSON.parse(data);
        data.forEach((element, index) => {
          var valor = index + 1;
          var nombre = element.nombre;
          htmlcontent +=
            '<option value="' + valor + '"> ' + nombre + " </option>";
        });
        $("#subdependencia").html(htmlcontent);
      });
    }
  });

  $("#submit").click(evt => {
    var dependencia = $("#dependencia").val();
    var subdependencia = $("#subdependencia").val();
    if (dependencia !== "0" || subdependencia !== "0") {
      $.post(
        "generador.php",
        { dependencia: dependencia, subdependencia: subdependencia },
        function(data) {
          var json = JSON.parse(data);
          var html = json.FIET + "." + json.dependencia + "." + json.subdependencia + "/" + json.consecutivo;
          $("#generado").html(html);
        }
      );
    } else {
      alert("Debe seleccionar la dependencia y subdependencia");
    }
  });

  $("#codigo").click(evt => {
    var dependencia = $("#dependencia").val();
    var subdependencia = $("#subdependencia").val();
    if (dependencia !== "0" || subdependencia !== "0") {
      $.get(
        "codigo.php",
        { d: dependencia, s: subdependencia },
        function(data) {
          var json = JSON.parse(data);
          var html = json.FIET + "." + json.dependencia + "." + json.subdependencia + "/" + json.consecutivo;
          $("#generado").html(html);
        }
      );
    } else {
      alert("Debe seleccionar la dependencia y subdependencia");
    }
  });
});
