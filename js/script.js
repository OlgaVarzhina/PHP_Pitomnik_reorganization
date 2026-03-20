//В работе.
document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        // Убираем активный класс у всех кнопок и добавляем нажатой
        document.querySelector('.filter-btn.active').classList.remove('active');
        button.classList.add('active');

        const filter = button.getAttribute('data-filter');
        const cards = document.querySelectorAll('.pet-card');

        cards.forEach(card => {
            const category = card.getAttribute('data-category');
            
            if (filter === 'all' || category === filter) {
                card.classList.remove('hide');
            } else {
                card.classList.add('hide');
            }
        });
    });
});

document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelector('.filter-btn.active').classList.remove('active');
        button.classList.add('active');

        const filter = button.getAttribute('data-filter');
        const cards = document.querySelectorAll('.pet-card');

        cards.forEach(card => {
            const category = card.getAttribute('data-category');
            
            if (filter === 'all' || category === filter) {
                card.classList.remove('hide');
            } else {
                card.classList.add('hide');
            }
        });
    });
});

const sliderSlides = document.getElementById('slider-slides');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        let currentIndex = 0;
        const totalSlides = slides.length;

        // Функция для обновления позиции слайдера
        function updateSlider() {
            // Сдвигаем контейнер со слайдами влево на величину (currentIndex * 100%)
            sliderSlides.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        // Кнопка "Вперед"
        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides; // Зацикливаем
            updateSlider();
        });

        // Кнопка "Назад"
        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        // Автоматическое переключение
        let autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        }, 5000); // Каждые 5 секунд

        // Останавливает автопереключение при наведении мыши
        const sliderContainer = document.getElementById('main-slider');
        sliderContainer.addEventListener('mouseenter', () => clearInterval(autoSlide));
        sliderContainer.addEventListener('mouseleave', () => {
            autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlider();
            }, 5000);
        });