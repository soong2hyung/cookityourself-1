# -*- coding: utf-8 -*-

import sys
import csv
import requests
import re
from bs4 import BeautifulSoup

def parse_allrecipes_cite(url_):
    item = []
    sorce_code = requests.get(url_)
    text_file = sorce_code.text
    soup = BeautifulSoup(text_file, "lxml")
    #p = re.compile('[가-힣()\s]+')
    try:
        food_title = soup.find("h1", {"class": "fn"}).text
        food_title = food_title.strip()
        #food_title = food_title.replace("\n", " ")
        ingredient_number = 0
        ingredient = []
        recipe_tag = []
        #print "food title: " + food_title
        food_image_url = soup.find_all("img")
        #print "cite url: " + url_
        #print "food image_url: " + food_image_url[2]["src"]
        item.append(food_title)
        item.append(url_)
        item.append(food_image_url[2]["src"])
        food_ingredient_list = soup.find("section", {"class", "recipeIngredients"})
        for food_ingredient in food_ingredient_list.find_all_next("li", {"class": "ingredient"}):
            ingredient_number += 1
            type_ = food_ingredient.find_next("span", {"class": "name"})
            temp_ = type_.find_next("span").text
            type_ = type_.text
            type_ = type_.replace(temp_, "")
            type_ = type_[:-1]
            #type_ = p.findall(type_)
            #type_ = type_[:type_.rfind(" ")]
            ingredient.append(type_)

            #ingredient.append(',')
            #print type_
        #print ingredient_number
        item.append(ingredient_number)
        item.append(ingredient)
        item.append(recipe_tag)
    except:
        print "error " + url_

    return item

def make_url(url_, number):
    return url_+ "?page="+str(number)

def parse_allrecipes_get_list(url_):
    # url_list = {key=레시피 url, value=레시피 이름}
    url_list = {}
    source_code = requests.get(url_).text
    source_soup = BeautifulSoup(source_code, "lxml")
    last_number = source_soup.find("a", {"id": "ctl00_ctl00_mainContainer_cphMain_uxPagerBottom_LastLinkButton"}).text
    last_number = int(last_number)
    d = 0
    #print url_ +" N: " + str(last_number)
    for i in range(1, last_number+1):
        #최대 페이지까지 사이트 주소 얻어서 저장함
        list_cite_url = make_url(url_, i)
        #print list_cite_url
        list_source_code = requests.get(list_cite_url).text
        list_source_soup = BeautifulSoup(list_source_code, "lxml")
        for list_name_file in list_source_soup.find_all("a", {"class": "bigFont"}):
            list_name = list_name_file.text
            list_url = list_name_file["href"]
            url_list[list_url]=list_name
            d += 1
    #print "count: " + str(d)

    return url_list

def parse_allrecipes_main():
    url_ = "http://allrecipes.kr/sitemap.aspx"
    #파싱할 주 재료 태그 목록
    check_list_norm = (u"쇠고기", u"돼지고기", u"닭고기", u"빵/밀가루", u"면류", u"쌀/밥/떡/곡물", u"국/스프", u"찌개/전골/스튜", u"쌈/버거/샌드위치", u"빵/파이/과자")
    #check_list_norm = (u"국/스프")
    # key=태그 사이트 url, value=tag
    check_url_dictionary = {}
    items = {}
    source_code = requests.get(url_).text
    source_soup = BeautifulSoup(source_code, "lxml")
    for tag_list in source_soup.find_all("div", {"class": "sitemapbullet"}):
        # 적절한 태그 선별작업
        tag_url = tag_list.a["href"]
        tag_name = tag_list.text
        if tag_name in check_list_norm:
            #print tag_name + " : "+ tag_url
            check_url_dictionary[tag_url] = tag_name
    for (tag_url, tag_name) in check_url_dictionary.items():
        #태그 사이트 하나씩 조사
        # url_list = {key=레시피 url, value=레시피 이름}
        url_list = parse_allrecipes_get_list(tag_url)
        #print url_list
        #tag_group = []
        #for (recipe_url, recipe_name) in url_list.items():
        #    print recipe_name + ": " +recipe_url
        print "matching..."
        for (recipe_url, recipe_name) in url_list.items():
            if items.has_key(recipe_name):
                items[recipe_name][5].append(tag_name)
            else:
                item = parse_allrecipes_cite(recipe_url)
                item[5].append(tag_name)
                items[recipe_name] = item
                #print item[0]
                #print item[1]
                #print item[2]
                #print item[3]
                #print "."


    return items

def main(argv):
    #print u"메인 함수"
    file_name = "allrecipes" + u".csv"
    items = parse_allrecipes_main()

    #print items
    print "writing"
    with open(file_name, 'wb') as f:
        writer = csv.writer(f, csv.excel)
        for (a, b) in items.items():
            utf_8_item = []
            utf_8_item.append(unicode(b[0]).encode('utf-8'))
            utf_8_item.append(unicode(b[1]).encode('utf-8'))
            utf_8_item.append(unicode(b[2]).encode('utf-8'))
            ingredients = ""
            for str_ in b[4]:
                ingredients += str_+","
            ingredients = ingredients[:-1]
            utf_8_item.append(unicode(ingredients).encode('utf-8'))
            tag = ""
            for str_ in b[5]:
                tag += str_.replace("/", ",") +","
            tag = tag[:-1]
            utf_8_item.append(unicode(tag).encode('utf-8'))
            writer.writerow(utf_8_item)

    print "finish"

    return 0

if __name__ == '__main__':
    sys.exit(main(sys.argv))
