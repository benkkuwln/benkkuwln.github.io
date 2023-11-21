/*
 *  Documentation: https://kaboomjs.com/
 */

// global variables
let SPEED = 240;
let GAME_ON = true;
let score = 0;
// start the game environment (background size 1800x893)
kaboom({ width: 900, height: 446, canvas: document.getElementById("game_canvas") });

// load resources
loadSprite("BG", "images/BG.png");
// platform
loadSprite("platform", "images/2.png");
// obstacle
loadSprite("crystal", "images/Crystal.png");

// player
loadSprite("player", "images/spritesheet.png", {
    // The image contains 11 frames layed out horizontally, slice it into individual frames
    sliceX: 11,
    // Define animations
    anims: {
        "run": {
            // Starts from frame 0, ends at frame 10
            from: 0,
            to: 10,
            // Frame per second
            speed: 5,
            loop: true,
        },
    },
})
// create scene for game
scene("game", () => {
    // background
    add([
        sprite("BG"),
        scale(0.5),
        z(0),
    ]);
    // platform(s)
    for (var i = 0; i < 50; i++) {
        add([
            sprite("platform"),
            area(),
            solid(),
            scale(0.5),
            pos(i * 24, height() - 24),
        ]);
    }
    // player
    const player = add([
        sprite("player"),
        pos(100, 0),
        scale(0.25),
        area(),
        body(),
    ]);
    // ui
    // display score
	const scoreLabel = add([
		text(score),
		pos(width() / 2, 80),
		fixed(),
		z(100),
	]);

	function addScore() {
		score++;
		scoreLabel.text = score;	
	}

    function jump() {
        if (player.isGrounded() && GAME_ON) {
            player.jump(1000);
        }
    }
    onKeyPress("space", jump);

    function spawnCrystal() {
        if (GAME_ON) {
            // add crystal obj
            add([
                sprite("crystal"),
                area(),
                cleanup(), // destroy when offscreen
                pos(900 - 96, height() - 96),
                move(LEFT, SPEED),
                "crystal",
            ]);

            // wait a random amount of time to spawn next tree
            wait(1 + rand(0.5, 3), spawnCrystal)
        }
    }
    player.onCollide("crystal", (crystal) => {
        SPEED = 0;
        GAME_ON = false;
        destroy(crystal);
        player.stop();
        addKaboom(player.pos);
        shake(12);
    })
    
    // .play is provided by sprite() component, it starts playing the specified animation (the animation information of "idle" is defined above in loadSprite)
    player.play("run")
    spawnCrystal();
    loop(1, () => {
        addScore();
    });
})

go("game");