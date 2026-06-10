from PIL import Image, ImageChops
import os

os.makedirs('assets/img', exist_ok=True)

def trim_and_save(input_path, output_path, max_size=(512, 512)):
    print(f"Processing {input_path}...")
    try:
        img = Image.open(input_path).convert("RGBA")
        
        # Trim whitespace
        # Get bounding box of non-transparent pixels
        bbox = img.getbbox()
        if bbox:
            img = img.crop(bbox)
            print(f"  Cropped to bbox: {bbox}")
        
        # Resize maintaining aspect ratio
        img.thumbnail(max_size, Image.Resampling.LANCZOS)
        
        # Save to destination
        img.save(output_path, "PNG")
        print(f"  Saved to {output_path} with size {img.size}")
        return img.size
    except Exception as e:
        print(f"  Error processing {input_path}: {e}")
        return None

# Process each logo
# 1. Tiny Crews
trim_and_save('scratch/downloads/tinycrews.png', 'assets/img/tinycrews-logo.png')

# 2. IqbalAI
trim_and_save('scratch/downloads/iqbalai.png', 'assets/img/iqbalai-logo.png')

# 3. His & Hers
# Let's inspect hisandhers_0.png and check if it's the correct logo.
trim_and_save('scratch/downloads/hisandhers_0.png', 'assets/img/hisandhers-logo.png')

# 4. Build On Hybrid
# Let's check buildonhybrid_fav.png
trim_and_save('scratch/downloads/buildonhybrid_fav.png', 'assets/img/buildonhybrid-logo.png')
