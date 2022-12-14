import random 
from random import choice
import requests

session = requests.Session()
adresses ={"maki.fr"}


def login(email, password,adresse):
  files = {
    "u_email": (None, email),
    "u_password": (None, password),
  }
  data = session.post("http://"+adresse+"/signin.php", files=files)      # Changer la source pour correspondre au programme
  #print(data.text)
  print("Login ok on:", adresse)

def get_all_restaurants_add_review(adresse):
  data = session.get("http://"+adresse+"/all_restaurant.php")    # Changer la source pour correspondre au programme
  lines = data.text.split("\n")
  urls = []
  url_random = []
  for line in lines:
    if "add_review.php" in line:
      line = line.strip()
      line = line.replace("<a href="", "")
      line = line.replace("" role="button" class="btn btn-primary btn-sm">Ajouter un avis</a>", "")
      url = "http://"+adresse+"/" + line    # Changer la source pour correspondre au programme
      urls.append(url)
  url_random = random.choices(urls, k = 2)
  # print(url_random)
  return url_random

def write_review(url_random, notes, avis):
  files = {
    "r_rating": (None, notes),
    "review": (None, avis),
  }
  data = session.post(url_random, files=files)
  print("sent avis:", url_random)


def run_bot(adresse):
  login("bot@bot", "bot",adresse)
  restaurant_review_urls = get_all_restaurants_add_review(adresse)
  review_negative = ["C`est un mauvais restaurant","Ce restaurant est très mauvais, je ne reviendrai plus","Un restaurant horrible","Repas vraiment décevant","Je ne recommande pas ce restaurant","Je ne reviendrai plus jamais ici","Un restaurant de qualité médiocre"]
  review_positive = ["Un restaurant très très positif","Ce restaurant est incroyable,je n`ai jamais rien mangé d`aussi délicieux","C`est le meilleur restaurant que je connaisse","un vrai délice","un restaurant de qualité","un restaurant de qualité exceptionnelle"]
  for X in range (0,500):
    write_review(restaurant_review_urls[0],"1", random.choice(review_negative))
    write_review(restaurant_review_urls[1],"5", random.choice(review_positive))


for adresse in adresses:
  run_bot(adresse)
