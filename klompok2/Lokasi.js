// Animasi counter statistik
const counters = document.querySelectorAll('.counter');
counters.forEach(counter => {
  counter.innerText = '0';

  const updateCount = () => {
    const target = +counter.getAttribute('data-count');
    const count = +counter.innerText;
    const speed = 200; 

    const increment = Math.ceil(target / speed);

    if(count < target){
      counter.innerText = count + increment;
      setTimeout(updateCount, 20);
    } else {
      counter.innerText = target;
    }
  };

  updateCount();
});
