from PIL import Image
import os

images = {
    "tinycrews.png": "scratch/downloads/tinycrews.png",
    "iqbalai.png": "scratch/downloads/iqbalai.png",
    "hisandhers_0.png": "scratch/downloads/hisandhers_0.png",
    "hisandhers_1.png": "scratch/downloads/hisandhers_1.png",
    "hisandhers_2.png": "scratch/downloads/hisandhers_2.png",
    "buildonhybrid_fav.png": "scratch/downloads/buildonhybrid_fav.png",
    "buildonhybrid_og.png": "scratch/downloads/buildonhybrid_og.png"
}

for name, path in images.items():
    if os.path.exists(path):
        try:
            img = Image.open(path)
            print(f"{name}: size={img.size}, mode={img.mode}, format={img.format}")
        except Exception as e:
            print(f"{name}: error: {e}")
    else:
        print(f"{name}: path does not exist")
