<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name','Andrea Maurice') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Sora:wght@700&display=swap" rel="stylesheet">
    <style>
    body{
        font-family: 'Sora', sans-serif;
    }
    button{
        border: 2px solid #83c9f4;
        align-self: center;
        color: #909090;
        border-radius: 10%;
        padding-inline: 10px;
        background-color: #ffff;

    }
    h3{
        font-family: 'Sora', sans-serif;
    }
    a{
        text-decoration: none;
        color: gray;
        margin: 0px;
    }
    a:hover{
        color: #5a5a5a;
    }
    button:hover{
        border: 2px solid #009dff;
    }
    .row{
            margin-inline: 200px;
            margin-top: 300px;
            text-align: center;
            padding-inline: 0px;
        }

        particle {
        position: fixed;
        top: 0;
        left: 0;
        opacity: 0;
        pointer-events: none;
        background-repeat: no-repeat;
        background-size: contain;
        }
        .preloader {
        position: absolute;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/127738/mario-face.png);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <button data-type="square"><h3><a href="{{ url('/deyi') }}" data-type="square">Click me!</a></h3></button>
        </div>
    </div>


<script>
function pop (e) {
  let amount = 30;
  switch (e.target.dataset.type) {
    case 'shadow':
    case 'line':
      amount = 60;
      break;
  }
  // Quick check if user clicked the button using a keyboard
  if (e.clientX === 0 && e.clientY === 0) {
    const bbox = e.target.getBoundingClientRect();
    const x = bbox.left + bbox.width / 2;
    const y = bbox.top + bbox.height / 2;
    for (let i = 0; i < 30; i++) {
      // We call the function createParticle 30 times
      // We pass the coordinates of the button for x & y values
      createParticle(x, y, e.target.dataset.type);
    }
  } else {
    for (let i = 0; i < amount; i++) {
      createParticle(e.clientX, e.clientY + window.scrollY, e.target.dataset.type);
    }
  }
}
function createParticle (x, y, type) {
  const particle = document.createElement('particle');
  document.body.appendChild(particle);
  let width = Math.floor(Math.random() * 30 + 8);
  let height = width;
  let destinationX = (Math.random() - 0.5) * 700;
  let destinationY = (Math.random() - 0.5) * 700;
  let rotation = Math.random() * 520;
  let delay = Math.random() * 200;
  
  switch (type) {
    case 'square':
      particle.style.background = `hsl(${Math.random() * 90 + 270}, 70%, 60%)`;
      break;
  }
  particle.style.width = `${width}px`;
  particle.style.height = `${height}px`;
  const animation = particle.animate([
    {
      transform: `translate(-50%, -50%) translate(${x}px, ${y}px) rotate(0deg)`,
      opacity: 1
    },
    {
      transform: `translate(-50%, -50%) translate(${x + destinationX}px, ${y + destinationY}px) rotate(${rotation}deg)`,
      opacity: 0
    }
  ], {
    duration: Math.random() * 1000 + 7000,
    easing: 'cubic-bezier(0, .9, .57, 1)',
    delay: delay
  });
  animation.onfinish = removeParticle;
}
function removeParticle (e) {
  e.srcElement.effect.target.remove();
}

if (document.body.animate) {
  document.querySelectorAll('button').forEach(button => button.addEventListener('click', pop));
}
</script>

<!-- https://css-tricks.com/playing-with-particles-using-the-web-animations-api/ Button Source Code -->
</body>
</html>
