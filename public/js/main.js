const burgerIcon = document.querySelector('#burger');
const navbarMenu = document.querySelector('#nav-links');

burgerIcon.addEventListener('click', () => {
  navbarMenu.classList.toggle('is-active')
});

//tabs
const tabs = document.querySelectorAll('.tabs li');
const tabContentBoxes = document.querySelectorAll('#tab-content > div');
const dateInput = document.querySelector('#date');
const timeInput = document.querySelector('#time');
const cinemaInput = document.querySelector('#cinema');
const timeButton = document.querySelectorAll('.accordion-body button');
const cinemaButton = document.querySelectorAll('.accordion-button.collapsed');

tabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    tabs.forEach(item => item.classList.remove('is-active'));
    tab.classList.add('is-active');
    dateInput.value = tab.dataset.target;

    const target = tab.dataset.target;
    tabContentBoxes.forEach(box => {
      if (box.getAttribute('id') === target){
        box.classList.remove('is-hidden');
      } else {
        box.classList.add('is-hidden');
      }
    })
  })
})

timeButton.forEach((tb) => {
  tb.addEventListener('click', () => {
    timeInput.value = tb.dataset.time;
  })
})

cinemaButton.forEach((cb) => {
  cb.addEventListener('click', () => {
    cinemaInput.value = cb.dataset.cinema;
  })
})





//modal

// const showTimeButton = document.querySelector('#show-time');
// const modalBg = document.querySelector('.modal-background');
// const modalCtn = document.querySelector('.modal-content');
// const modal = document.querySelector('.modal');

// showTimeButton.addEventListener('click', () => {
//   modal.classList.add('is-active');
//   console.log(modalCtn);
//   console.log(modalCtn.style);
//   modalCtn.classList.add('is-full')
// });

// modalBg.addEventListener('click', () => {
//   modal.classList.remove('is-active')
// })

// const disabledSeats = document.querySelectorAll('.disable');
// disabledSeats.forEach((disabledSeat) => {
//   disabledSeat.checked = true;
//   disabledSeat.disabled = true;
// })

// //button
// const seats = document.querySelectorAll('.seats');
// const seatNumber = document.querySelector('.seat-number');
// const price = document.querySelector('.price');
// const seatAmount = document.querySelector('.seat-amount')
// let takenSeats = 0;
// seats.forEach((seat) => {
//   const button = '<a class="button is-danger is-small mx-1 my-1" id="' + seat.value + '" href="">' + seat.value + '</a>';
//   const value = seat.value;
//   seat.addEventListener('click', () => {
//     if (seat.checked) {
//       const buttonId = document.querySelector(`#${value}`);
//       if (!buttonId) {
//         seatNumber.innerHTML += button;
//         takenSeats++;
//         console.log(takenSeats);
//         seatAmount.textContent = `${takenSeats} Kursi dipilih`
//         price.textContent = `Rp. ${50000 * takenSeats}`;
//       }
//     } else {
//       const buttonId = document.querySelector(`#${value}`);
//       buttonId.parentElement.removeChild(buttonId);
//       takenSeats--;
//       console.log(takenSeats);
//       seatAmount.textContent = `${takenSeats} Kursi dipilih`
//       price.textContent = `Rp. ${50000 * takenSeats}`;
//     }
//   })
// })



