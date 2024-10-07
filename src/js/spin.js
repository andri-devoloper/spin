window.onload = function () {
  console.log("Data sectors:", sectors);

  if (!sectors || !Array.isArray(sectors)) {
    console.error("Sectors is not an array or is undefined");
    return;
  }

  const events = {
    listeners: {},
    addListener: function (eventName, fn) {
      this.listeners[eventName] = this.listeners[eventName] || [];
      this.listeners[eventName].push(fn);
    },
    fire: function (eventName, ...args) {
      if (this.listeners[eventName]) {
        for (let fn of this.listeners[eventName]) {
          fn(...args);
        }
      }
    },
  };

  const rand = (m, M) => Math.random() * (M - m) + m;
  const tot = sectors.length;
  console.log("Total sectors:", tot);

  const spinEl = document.querySelector("#spin");
  const ctx = document.querySelector("#wheel").getContext("2d");
  const dia = ctx.canvas.width;
  const rad = dia / 2;
  const PI = Math.PI;
  const TAU = 2 * PI;
  const arc = (2 * Math.PI) / sectors.length;

  const friction = 0.991;
  let angVel = 0;
  let ang = 0;

  let spinButtonClicked = false;

  const getIndex = () => Math.floor(tot - (ang / TAU) * tot) % tot;

  function getRandomColor() {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }

  function drawSector(sector, i) {
    const ang = arc * i;
    ctx.save();
    ctx.beginPath();
    ctx.fillStyle = getRandomColor();
    ctx.moveTo(rad, rad);
    ctx.arc(rad, rad, rad, ang, ang + arc);
    ctx.lineTo(rad, rad);
    ctx.fill();

    ctx.translate(rad, rad);
    ctx.rotate(ang + arc / 2);
    ctx.textAlign = "right";
    ctx.fillStyle = sector.text;
    ctx.font = "bold 20px 'Lato', sans-serif";
    ctx.fillText(sector.label, rad - 10, 10);
    ctx.restore();
  }

  function rotate() {
    const sector = sectors[getIndex()];
    ctx.canvas.style.transform = `rotate(${ang - PI / 2}rad)`;

    spinEl.textContent = !angVel ? "SPIN" : sector.label;
    spinEl.style.background = sector.color;
    spinEl.style.color = sector.text;
  }

  function frame() {
    if (!angVel && spinButtonClicked) {
      const finalSector = sectors[getIndex()];
      events.fire("spinEnd", finalSector);
      spinButtonClicked = false;
      return;
    }

    angVel *= friction;
    if (angVel < 0.002) angVel = 0;
    ang += angVel;
    ang %= TAU;
    rotate();
  }

  function engine() {
    frame();
    requestAnimationFrame(engine);
  }

  function init() {
    sectors.forEach(drawSector);
    rotate();
    engine();
    spinEl.addEventListener("click", () => {
      if (!angVel) angVel = rand(0.25, 0.45);
      spinButtonClicked = true;
    });
  }

  init();
  const audio = new Audio("./src/audio/yeay.mp3");

  console.log(audio);

  events.addListener("spinEnd", (sector) => {
    audio.play();
    Swal.fire({
      title: `${sector.label}`,
      text: `${sector.question}`,
    });
  });
};
