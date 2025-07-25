<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Master | Mind Arena</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: white;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(78,205,196,0.4) 0%, transparent 70%);
            filter: blur(80px);
            animation: glowMove 8s infinite alternate;
        }

        .container {
            max-width: 800px;
            width: 90%;
            text-align: center;
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            padding: 3rem 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transform: translateY(50px);
            opacity: 0;
            animation: containerEnter 1s cubic-bezier(0.23, 1, 0.32, 1) forwards;
        }

        .title {
            font-size: 4.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #ff6b6b, #ffd93d);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 20px rgba(255, 107, 107, 0.3);
            animation: titleFloat 3s ease-in-out infinite alternate;
        }

        .description {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.8;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            animation: textFade 1s ease-out 0.4s forwards;
        }

        .start-button {
            padding: 1.2rem 4rem;
            font-size: 1.3rem;
            background: linear-gradient(45deg, #4ecdc4, #45b7af);
            border: none;
            border-radius: 15px;
            color: white;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            opacity: 0;
            animation: buttonRise 1s ease-out 0.8s forwards;
            box-shadow: 0 4px 15px rgba(78, 205, 196, 0.3);
        }

        .start-button:hover {
            transform: scale(1.05) rotate(-1deg);
            box-shadow: 0 8px 30px rgba(78, 205, 196, 0.5);
        }

        @keyframes containerEnter {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes titleFloat {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        @keyframes textFade {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes buttonRise {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes glowMove {
            0% { transform: translate(-20%, -20%); }
            100% { transform: translate(20%, 20%); }
        }

        @keyframes particleFloat {
            0% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(-100px); opacity: 0; }
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: particleFloat linear infinite;
        }

        @media (max-width: 768px) {
            .title {
                font-size: 3rem;
            }
            .description {
                font-size: 1rem;
            }
            .container {
                padding: 2rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="glow"></div>

    <div class="container">
        <h1 class="title">Quiz Master</h1>
        <p class="description">
            Embark on a journey of knowledge through meticulously crafted challenges.<br>
            Prove your intellect across diverse domains and etch your name in the halls of wisdom.
        </p>
        <button class="start-button" onclick="location.href='home.html'" style="cursor: pointer;">Start</button>
    </div>

    <script>
        function createParticles() {
            const container = document.body;
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.width = `${Math.random() * 3 + 2}px`;
                particle.style.height = particle.style.width;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.animationDuration = `${Math.random() * 5 + 5}s`;
                particle.style.opacity = Math.random() * 0.5 + 0.3;
                container.appendChild(particle);
            }
        }

        window.onload = createParticles;
    </script>
</body>
</html>
