$(document).ready(function () {
    // Función para cargar y mostrar el PDF
    function cargarPDF() {
        fetch('../../controlador/pdf_get.php')
            .then(response => response.blob())
            .then(data => {
                const url = window.URL.createObjectURL(data);
                document.getElementById('visor-pdf').setAttribute('src', url);
            });
    }

    cargarPDF();

    // Función para cargar un nuevo PDF
    $('#cargar-pdf').change(function () {
        const archivo = this.files[0];
        const formData = new FormData();
        formData.append('archivo', archivo);

        $.ajax({
            type: 'POST',
            url: '../../controlador/pdf_add.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                cargarPDF();
            },
            error: function () {
                alert('Error al cargar el PDF.');
            }
        });
    });
});
