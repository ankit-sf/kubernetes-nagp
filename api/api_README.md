# to push to google artifactory
docker build -t asia-south2-docker.pkg.dev/kubernetes-nagp-ankit/php-api .
docker push asia-south2-docker.pkg.dev/kubernetes-nagp-ankit/php-api

# optional to create on local
docker run -d -it --rm -e MYSQL_USER='user' -e MYSQL_DATABASE='mydatabase' -e MYSQL_PASSWORD='password' --name php_demo_container -p 80:80 asia-south2-docker.pkg.dev/kubernetes-nagp-ankit/php-api 


<!-- kubectl delete sts,pod,svc,pv,pvc --all
kubectl get sts,pod,svc,pv,pvc -->