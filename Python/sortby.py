def sortby(i):
	sortin = sorted(i)
	strok = ""
	for char in sortin:
		strok = strok + str(char)
	print (strok)
a = input("vvedite cifrovuu stroku ")	
#a = raw_input("vvedite cifrovuu stroku ")
sortby(a)