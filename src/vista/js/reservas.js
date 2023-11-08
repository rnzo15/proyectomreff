const seats = document.querySelectorAll('.seat');

seats.forEach(seat => {
    seat.addEventListener('click', () => {
        if (!seat.classList.contains('reserved')) {
            seat.classList.toggle('selected');
        }
    });
});

const reservarButton = document.getElementById('reservar');

reservarButton.addEventListener('click', () => {
    const selectedSeats = document.querySelectorAll('.seat.selected');

    if (selectedSeats.length > 0) {
        selectedSeats.forEach(seat => {
            seat.classList.remove('selected');
            seat.classList.add('reserved');
        });
        alert(`Asientos reservados: ${selectedSeats.length}`);
    } else {
        alert('No se han seleccionado asientos para reservar.');
    }
});
