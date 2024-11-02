<style>
    body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f0f0f0;
    padding: 20px;
}

.license {
    width: 800px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.license-front, .license-back {
    padding: 15px;
    background-color: #f4e2b8;
    color: #333;
    position: center;
    text-align: left;
}

.license-front {
    border-bottom: 1px solid #ccc;
}

.photo {
    width: 4.5cm;
    height: 5cm;
    border: 2px solid #333;
    float: left;
    margin-right: 15px;
    background-color: #fff;
}

.photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.info {
    font-size: 14px;
}

.info h2 {
    margin: 0;
    font-size: 16px;
    color: #444;
}

.info p {
    margin: 4px 0;
}

.watermark {
    position: absolute;
    bottom: 10px;
    right: 10px;
    font-size: 24px;
    color: rgba(0, 0, 0, 0.1);
    transform: rotate(-30deg);
}

.license-back {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.seal {
    margin-top: 15px;
    font-size: 12px;
    color: #666;
    border: 1px solid #666;
    padding: 10px;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.barcode {
    margin-top: 15px;
    font-size: 14px;
    color: #333;
    font-weight: bold;
}

.signature {
    margin-top: 20px;
    font-size: 14px;
    color: #444;
    border-top: 1px solid #333;
    padding-top: 5px;
}

</style>
<!DOCTYPE html>


<div class="license">
    <!-- Frente de la licencia -->
    <div class="license-front">
        <div class="photo">
            <img src="ruta/a/tu/foto.jpg" alt="Foto del titular">
        </div>
        <div class="info">
            <h2>LICENCIA DE CONDUCTOR</h2>
            <p>REPUBLICA DE CHILE</p>
            <p><strong>Clase:</strong> B/C</p>
            <p><strong>RUT:</strong> 20.448.452-K</p>
            <p><strong>Comuna:</strong> SAN RAMON</p>
            <p><strong>Nombres:</strong> PLANTILLANDIA</p>
            <p><strong>Apellidos:</strong> PEREZ GONZALEZ</p>
            <p><strong>Dirección:</strong> PJE. GALVARINO 1049</p>
            <p><strong>Fecha de emisión:</strong> 08/10/2021</p>
            <p><strong>Fecha de expiración:</strong> 14/05/2027</p>
        </div>
        <div class="watermark">Plantilla</div>
    </div>

    <!-- Reverso de la licencia -->
    <div class="license-back">
        <div class="seal">
            <p>DEPARTAMENTO DE TRANSITO</p>
            <p>DIRECTOR</p>
            <p>LA FLORIDA</p>
            <p>ESPECIALIDAD</p>
        </div>
        <p><strong>Restricciones:</strong> Ninguna</p>
        <div class="barcode">CA 22814764</div>
        <p class="signature">Firma del Conductor</p>
    </div>
</div>

</html>