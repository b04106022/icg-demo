import argparse
from PIL import Image
import glob

if __name__ == '__main__' :

    # Input arguments
    ap = argparse.ArgumentParser()
    ap.add_argument("-p", "--path", required=True, help="path to morpged images")
    args = vars(ap.parse_args())
    
    # Create the frames
    frames = []
    path = args["path"]
    imgs = glob.glob( path + "\*.png")
    for i in imgs:
        new_frame = Image.open(i)
        frames.append(new_frame)
     
    # Save into a GIF file that loops forever
    frames[0].save(path + '\morphing.gif', format='GIF',
                   append_images=frames[1:],
                   save_all=True,
                   duration=100, loop=0)
                   
    print('Morphing results(.gif) exported in ' + path)
    print('Done!')
