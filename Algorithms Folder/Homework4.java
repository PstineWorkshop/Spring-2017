// The Homework4 class that finds shortest paths from the source node to all 
// other vertices in a weighted and directed graph
// Your name here
import java.lang.Object.*;
public class Homework4{
    private final int inf = 99999;
    
    // This method takes as parameters the number of vertices n and the adjacent matrix W.
    // It returns a string that contains all the edges in shortest paths.
    // USE v1 AS THE SOURCE VERTEX.
    public String dijkstra(int n, int[][] W){
       
       int i;
	   int j;
	   int count=0;
	   int vertexNearest=-1;
	   int vertexStart;
	   int vertexEnd;
	   int [] touchVertex = new int [n + 1];
       int [] vertexLengh = new int [n + 1];
	   String answer="";
	   String string="";
	   int minimum;
      boolean addSemiColon=false;
	   
	   for(i=2;i<=n;i++){
		   touchVertex[i] = 1;
           vertexLengh[i] = W[1][i];
	   }
	   
	   j=0;
	   while(j<n-1){
		   
		   minimum=inf;
		   
		   
		   for(i=2;i<=n;i++){
			 if(vertexLengh[i] >= 0 && vertexLengh[i] < minimum){
					minimum = vertexLengh[i];
					vertexNearest = i;
				}

		   }
		 vertexStart=touchVertex[vertexNearest];
         vertexEnd = vertexNearest;
         
		 count++;
		 if(count<n-1){
         addSemiColon=true;
         }
         else{
            addSemiColon=false;
         }
         if(addSemiColon){
            answer+="(v"+vertexStart+ ", v" + vertexEnd+ "), ";
         }
        
		 else{
			 answer+="(v"+vertexStart+ ", v" + vertexEnd+ ")" ;
		 }
		 
		 for( i = 2; i <= n; i++){
            if(vertexLengh[vertexNearest]+W[vertexNearest][i]<vertexLengh[i]){
				vertexLengh[i]=vertexLengh[vertexNearest] + W[vertexNearest][i];
				touchVertex[i]=vertexNearest;
			}
            
         } 
         
         vertexLengh[vertexNearest] = -1;

		j++;
	   }
	   
      return answer;

    }
}
