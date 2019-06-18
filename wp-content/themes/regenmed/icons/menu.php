<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-width="2">
        <path d="M2 9 h26.437">
            <animate
                dur="0.3s" begin="startAnimation.begin" attributeName="d" 
                values="M2 9 L27.437 9; M7 9 L22.437 23"
                fill="freeze" keyTimes="0;1"
            />
            <animate
                dur="0.3s" begin="reverseAnimation.begin" attributeName="d" 
                values="M7 9 L22.437 23;M2 9 L27.437 9"
                fill="freeze"
            />
        </path>
        <path d="M2 16h22" opacity="1">
            <animate
                dur="0.3s" begin="startAnimation.begin" attributeName="opacity" 
                values="1;0"
                fill="freeze"
            />
            <animate
                dur="0.3s" begin="reverseAnimation.begin" attributeName="opacity" 
                values="0;1"
                fill="freeze"
            />
        </path>
        <path d="M2 23 h18">
            <animate
                dur="0.3s" begin="startAnimation.begin" attributeName="d" 
                values="M2 23 L19 23; M7 23 L22.437 9"
                fill="freeze" keyTimes="0;1"
            />
            <animate
                dur="0.3s" begin="reverseAnimation.begin" attributeName="d" 
                values="M7 23 L22.437 9; M2 23 L19 23 "
                fill="freeze"
            />
        </path>
    </g>
    <rect width="32" height="32" fill-opacity="0">
        <animate dur="0.01s" id="startAnimation" attributeName="width" values="32; 0" fill="freeze" begin="click" />
        <animate dur="0.01s" attributeName="width" values="0; 32" fill="freeze" begin="reverseAnimation.end" />
    </rect>
    <rect width="0" height="32" fill-opacity="0">
        <animate dur="0.001s" id="reverseAnimation" attributeName="width" values="32; 0" fill="freeze" begin="click" />
        <animate dur="0.001s" attributeName="width" values="0; 32" fill="freeze" begin="startAnimation.end"/>
    </rect>
</svg>
