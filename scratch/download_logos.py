import urllib.request
import urllib.parse
import ssl
import os

ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

headers = {'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'}

def download_file(url, filename):
    print(f"Downloading {url} to {filename}...")
    try:
        req = urllib.request.Request(url, headers=headers)
        with urllib.request.urlopen(req, context=ctx, timeout=10) as response:
            data = response.read()
            with open(filename, 'wb') as f:
                f.write(data)
            print(f"  Success: {len(data)} bytes downloaded.")
            return True
    except Exception as e:
        print(f"  Error: {e}")
        return False

os.makedirs('scratch/downloads', exist_ok=True)

# 1. Tiny Crews
download_file('https://tinycrews.com/cdn/shop/files/Logo_-_Tiny_Crews.png?v=1665077814', 'scratch/downloads/tinycrews.png')

# 2. IqbalAI
download_file('https://iqbalai.com/static/images/logo.png', 'scratch/downloads/iqbalai.png')

# 3. His & Hers (Try various options)
hh_variants = [
    "https://hisandhers.com.pk/assets/logo_prev_ui%20(1).png",
    "https://hisandhers.com.pk/assets/next-white-v2-logonew-removebg-preview-300x184-1%20(1).png",
    "https://hisandhers.com.pk/assets/HM-Logo-1968-1999-300x169-1%20(1).png"
]
for idx, url in enumerate(hh_variants):
    download_file(url, f'scratch/downloads/hisandhers_{idx}.png')

# 4. Build On Hybrid (OG Image)
download_file('https://framerusercontent.com/images/paZleBWo87Mj2ZdYTXVCELVOBJU.png', 'scratch/downloads/buildonhybrid_fav.png')
download_file('https://framerusercontent.com/images/8AKx5pyUTB85o2185G4sGGQH8I.png', 'scratch/downloads/buildonhybrid_og.png')
