var camera, scene, renderer;
var radius = window.innerWidth * 0.5, theta = 0, phi = 0;


function init() {
    var container = document.createElement('background');
    container.style.position = 'fixed';
    container.style.zIndex = '-3';
    container.style.transformOrigin = 'top left';
    container.style.transform = 'scale(' + 1.0 / window.devicePixelRatio + ')';
    document.body.appendChild(container);
    
    camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 10000);
    camera.position.set(0, 0, 0);

    scene = new THREE.Scene();
    refreshScene(window.innerWidth * 0.15);

    renderer = new THREE.CanvasRenderer();
    renderer.setSize(window.innerWidth * window.devicePixelRatio, window.innerHeight * window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    window.addEventListener('resize', function () {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        radius = window.innerWidth * 0.5;
        renderer.setSize(window.innerWidth * window.devicePixelRatio, window.innerHeight * window.devicePixelRatio);
        refreshScene(window.innerWidth * 0.15);
    }, false);
}


function refreshScene(particle_count) {
    // remove those redundant particles
    if(scene.children.length > particle_count) {
        for(var i = 0; i < scene.children.length - particle_count; i++) {
            scene.children.splice(i, 1);
        }
    }
    // add more particles if there are not enough
    else {
        const NUMBER_TO_ADD = particle_count - scene.children.length;
        for(var i = 0; i < NUMBER_TO_ADD; i ++) {
            var particle = new THREE.Particle(new THREE.ParticleCanvasMaterial({
                color: Math.random() * 0x808080 + 0x808080,
                program: function(context){
                    context.beginPath();
                    context.arc(0, 0, 1, 0, Math.PI * 2, true);
                    context.closePath();
                    context.fill();
                }}));
            particle.position.x = (Math.random() - 0.5) * window.innerWidth;
            particle.position.y = (Math.random() - 0.5) * window.innerWidth;
            particle.position.z = (Math.random() - 0.5) * window.innerWidth;
            particle.scale.x = particle.scale.y = Math.random() * 0.01 * window.innerWidth * window.devicePixelRatio;
            scene.add(particle);
        }
    }
}


function animate() {
    requestAnimationFrame(animate);
    // rotate camera
    theta += 0.04;
    phi += 0.02;

    camera.position.x = radius * Math.sin(theta * Math.PI / 180) * Math.cos(phi * Math.PI / 180);
    camera.position.y = radius * Math.cos(theta * Math.PI / 180) * Math.sin(phi * Math.PI / 180);
    camera.position.z = radius * Math.cos(phi * Math.PI / 180);
    camera.lookAt(scene.position);

    renderer.render(scene, camera);
}

init();
animate();