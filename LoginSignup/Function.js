var popup = document.getElementById('Confirmation');
var display = 0;

function hideShow() {
    if (popup.style.display === 'block') {
        popup.style.display = 'none';
        display = 0;  // Change to 0 when hiding
    } else {
        popup.style.display = 'block';
        display = 1;  // Change to 1 when showing
    }
}


document.addEventListener('DOMContentLoaded', () => {
    const calendarDates = document.getElementById('calendar-dates');
    const monthYear = document.getElementById('month-year');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const timeInputModal = document.getElementById('time-input-modal');
    const closeModal = document.querySelector('.close');
    const saveTimeButton = document.getElementById('save-time');
    const selectedDateElement = document.getElementById('selected-date');
    const timeInput = document.getElementById('time-input');
  
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();
    let selectedDate;
  
    const renderCalendar = (month, year) => {
        calendarDates.innerHTML = '';
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  
        monthYear.innerText = `${monthNames[month]} ${year}`;
  
        let date = 1;
        for (let i = 0; i < 6; i++) {
            const row = document.createElement('tr');
            
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    const cell = document.createElement('td');
                    row.appendChild(cell);
                } else if (date > daysInMonth) {
                    break;
                } else {
                    const cell = document.createElement('td');
                    cell.innerText = date;
                    cell.addEventListener('click', () => {
                        selectedDate = `${date}-${month + 1}-${year}`;
                        selectedDateElement.innerText = selectedDate;
                        timeInputModal.style.display = 'flex';
                    });
                    row.appendChild(cell);
                    date++;
                }
            }
            calendarDates.appendChild(row);
        }
    };
  
    prevButton.addEventListener('click', () => {
        currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
        currentYear = currentMonth === 11 ? currentYear - 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });
  
    nextButton.addEventListener('click', () => {
        currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
        currentYear = currentMonth === 0 ? currentYear + 1 : currentYear;
        renderCalendar(currentMonth, currentYear);
    });
  
    closeModal.addEventListener('click', () => {
        timeInputModal.style.display = 'none';
    });
  
    saveTimeButton.addEventListener('click', () => {
        const time = timeInput.value;
        if (time) {
            alert(`Time for ${selectedDate} is set to ${time}`);
            timeInputModal.style.display = 'none';
        } else {
            alert('Please select a time.');
        }
    });
  
    window.addEventListener('click', (event) => {
        if (event.target === timeInputModal) {
            timeInputModal.style.display = 'none';
        }
    });
  
    renderCalendar(currentMonth, currentYear);
});
